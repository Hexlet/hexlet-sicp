#lang racket/base
(require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

(require compatibility/mlist)


(define (car x) (mcar x))

(define (cdr x) (mcdr x))

(define (cons x y) (mcons x y))

(define (set-car! val lst) (set-mcar! val lst))

(define (set-cdr! val lst) (set-mcdr! val lst)) 

(define (self-evaluating? exp)
  (cond ((number? exp) #t)
        ((string? exp) #t)
        (else #f)))

(define (variable? exp) (symbol? exp))

(define (enclosing-environment env) (cdr env))

(define the-empty-environment '())

(define (first-frame env) (car env))

(define (frame-variables frame) (car frame))

(define (frame-values frame) (cdr frame))

(define (lookup-variable-value var env)
  (define (env-loop env)
    (define (scan vars vals)
      (cond ((null? vars)
             (env-loop (enclosing-environment env)))
            ((eq? var (car vars)) (car vals))
            (else (scan (cdr vars) (cdr vals)))))
    (if (eq? env the-empty-environment)
        (error "Unbound variable" var)
        (let ((frame (first-frame env)))
          (scan (frame-variables frame) (frame-values frame)))
        )) (env-loop env))

(define (tagged-list? exp tag)
  (if (pair? exp)
      (eq? (car exp) tag)
      #f))

(define (quoted? exp)
  (tagged-list? exp 'quote))

(define (text-of-quotation exp) (cadr exp))

(define (assignment? exp)
  (tagged-list? exp 'set!))

(define (assignment-variable exp) (cadr exp))

(define (assignment-value exp) (caddr exp))


(define (set-variable-value! var val env)
  (define (env-loop env)
    (define (scan vars vals)
      (cond ((null? vars)
             (env-loop (enclosing-environment env)))
            ((eq? var (car vars)) (set-car! vals val))
            (else (scan (cdr vars) (cdr vals)))))
    (if (eq? env the-empty-environment)
        (error "Unbound variable -- SET!" var)
        (let ((frame (first-frame env)))
          (scan (frame-variables frame) (frame-values frame)))))
  (env-loop env))


(define (make-lambda parameters body)
  (cons 'lambda (cons parameters body)))

(define (definition? exp)
  (tagged-list? exp 'define))

(define (definition-variable exp)
  (if (symbol? (cadr exp))
      (cadr exp)
      (caadr exp)))

(define (definition-value exp)
  (if (symbol? (cadr exp))
      (caddr exp)
      (make-lambda (cdadr exp)   ; formal parameters
                   (cddr exp)))) ; body

(define (add-binding-to-frame! var val frame)
  (set-car! frame (cons var (car frame)))
  (set-cdr! frame (cons val (cdr frame))))

(define (define-variable! var val env)
  (let ((frame (first-frame env)))
    (define (scan vars vals)
      (cond ((null? vars) (add-binding-to-frame! var val frame))
            ((eq? var (car vars)) (set-car! vals val))
            (else (scan (cdr vars) (cdr vals)))))
    (scan (frame-variables frame) (frame-values frame))))


(define (if? exp) (tagged-list? exp 'if))

(define (if-predicate exp) (cadr exp))

(define (if-consequent exp) (caddr exp))

(define (if-alternative exp)
  (if (not (null? (cdddr exp)))
      (cadddr exp)
      'false))

(define (true? x) (not (eq? x #f)))

(define (lambda? exp) (tagged-list? exp 'lambda))

(define (lambda-parameters exp) (cadr exp))

(define (lambda-body exp) (cddr exp))

(define (make-procedure parameters body env)
  (list 'procedure parameters body env))

(define (begin? exp) (tagged-list? exp 'begin))

(define (begin-actions exp) (cdr exp))

(define (last-exp? seq) (null? (cdr seq)))

(define (first-exp seq) (car seq))

(define (rest-exps seq) (cdr seq))


(define (cond? exp) (tagged-list? exp 'cond))

(define (cond-clauses exp) (cdr exp))

(define (cond-predicate clause) (car clause))

(define (cond-actions clause) (cdr clause))

(define (cond-else-clause? clause)
  (eq? (cond-predicate clause) 'else))

(define (make-begin seq) (cons 'begin seq))

(define (sequence->exp seq)
  (cond ((null? seq) seq)
        ((last-exp? seq) (first-exp seq))
        (else (make-begin seq))))

(define (make-if predicate consequent alternative)
  (list 'if predicate consequent alternative))

(define (expand-clauses clauses)
  (if (null? clauses)
      'false                          ; no else clause
      (let ((first (car clauses))
            (rest (cdr clauses)))
        (if (cond-else-clause? first)
            (if (null? rest)
                (sequence->exp (cond-actions first))
                (error "ELSE clause isn't last -- COND->IF"
                       clauses))
            (make-if (cond-predicate first)
                     (sequence->exp (cond-actions first))
                     (expand-clauses rest))))))

(define (cond->if exp)
  (expand-clauses (cond-clauses exp)))

(define (application? exp) (pair? exp))

(define (operator exp) (car exp))

(define (operands exp) (cdr exp))

(define (no-operands? ops) (null? ops))

(define (first-operand ops) (car ops))

(define (rest-operands ops) (cdr ops))

(define (make-frame variables values)
  (cons variables values))


(define (extend-environment vars vals base-env)
  (if (= (mlength vars) (mlength vals))
      (cons (make-frame vars vals) base-env)
      (if (< (length vars) (length vals))
          (error "Too many arguments supplied" vars vals)
          (error "Too few arguments supplied" vars vals))))


(define primitive-procedures
  (mlist (mlist 'car car) (mlist 'cdr cdr) (mlist 'cons cons) (mlist 'null? null?)))

(define (primitive-procedure-names) (mmap mcar primitive-procedures))

(define (primitive-procedure-objects)
  (mmap (lambda (proc) (mlist 'primitive (mcar (mcdr proc)))) primitive-procedures))

(define (setup-environment)
  (let ((initial-env (extend-environment (primitive-procedure-names) (primitive-procedure-objects) the-empty-environment)))
    (define-variable! 'true #t initial-env)
    (define-variable! 'false #f initial-env)
    initial-env))


(define the-global-environment (setup-environment))

(define (eval-assignment-lr exp env)
  (set-variable-value! (assignment-variable exp)
                       (eval-lr (assignment-value exp) env)
                       env)
  'ok)

(define (eval-assignment-rl exp env)
  (set-variable-value! (assignment-variable exp)
                       (eval-rl (assignment-value exp) env)
                       env)
  'ok)

(define (eval-definition-lr exp env)
  (define-variable! (definition-variable exp)
                    (eval-lr (definition-value exp) env)
                    env)
  'ok)

(define (eval-definition-rl exp env)
  (define-variable! (definition-variable exp)
                    (eval-rl (definition-value exp) env)
                    env)
  'ok)

(define (eval-if-lr exp env)
  (if (true? (eval-lr (if-predicate exp) env))
      (eval-lr (if-consequent exp) env)
      (eval-lr (if-alternative exp) env)))

(define (eval-if-rl exp env)
  (if (true? (eval-rl (if-predicate exp) env))
      (eval-rl (if-consequent exp) env)
      (eval-rl (if-alternative exp) env)))

(define (eval-sequence-lr exps env)
  (cond ((last-exp? exps) (eval-lr (first-exp exps) env))
        (else (eval-lr (first-exp exps) env)
              (eval-sequence-lr (rest-exps exps) env))))

(define (eval-sequence-rl exps env)
  (cond ((last-exp? exps) (eval-rl (first-exp exps) env))
        (else (eval-rl (first-exp exps) env)
              (eval-sequence-rl (rest-exps exps) env))))

(define (eval-lr exp env)
  (cond ((self-evaluating? exp) exp)
        ((variable? exp) (lookup-variable-value exp env))
        ((quoted? exp) (text-of-quotation exp))
        ((assignment? exp) (eval-assignment-lr exp env))
        ((definition? exp) (eval-definition-lr exp env))
        ((if? exp) (eval-if-lr exp env))
        ((lambda? exp)
         (make-procedure (lambda-parameters exp)
                         (lambda-body exp)
                         env))
        ((begin? exp)
         (eval-sequence-lr (begin-actions exp) env))
        ((cond? exp) (eval-lr (cond->if exp) env))
        ((application? exp)
         (apply (eval-lr (operator exp) env)
                (list-of-values-lr (operands exp) env)))
        (else
         (error "Unknown expression type -- EVAL" exp))))

(define (eval-rl exp env)
  (cond ((self-evaluating? exp) exp)
        ((variable? exp) (lookup-variable-value exp env))
        ((quoted? exp) (text-of-quotation exp))
        ((assignment? exp) (eval-assignment-rl exp env))
        ((definition? exp) (eval-definition-rl exp env))
        ((if? exp) (eval-if-rl exp env))
        ((lambda? exp)
         (make-procedure (lambda-parameters exp)
                         (lambda-body exp)
                         env))
        ((begin? exp)
         (eval-sequence-rl (begin-actions exp) env))
        ((cond? exp) (eval-rl (cond->if exp) env))
        ((application? exp)
         (apply (eval-rl (operator exp) env)
                (list-of-values-rl (operands exp) env)))
        (else
         (error "Unknown expression type -- EVAL" exp))))


(check-equal? (list-of-values-lr (mlist 1 2) the-global-environment) (mcons 1 (mcons 2 '())))
(check-equal? (list-of-values-rl (mlist 1 2) the-global-environment) (mcons 1 (mcons 2 '())))
(check-equal? (list-of-values-lr (mlist 'true 'false) the-global-environment) (mcons #t (mcons #f '())))
(check-equal? (list-of-values-rl (mlist 'true 'false) the-global-environment) (mcons #t (mcons #f '())))
