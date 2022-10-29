(define (eval-cond exp env)
   (eval (cond->if exp env) env))

(define (cond? exp) (tagged-list? exp 'cond))

(define (cond-clauses exp) (cdr exp))

(define (cond-else-clause? clause)
   (eq? (cond-predicate clause) 'else))

(define (cond-predicate clause) (car clause))

(define (cond-actions clause) (cdr clause))

(define (cond->if exp env)
   (expand-clauses (cond-clauses exp) env))
    
(define (expand-clauses clauses env)
   (if (null? clauses)
       'false
       (let ((first (car clauses))
             (rest (cdr clauses)))
         (if (cond-else-clause? first)
             (if (null? rest)
                 (sequence->exp (cond-actions first))
                 (error "ELSE clause isn't last -- COND->IF"
                        clauses))
             (make-if (cond-predicate first)
                      (sequence->exp (cond-actions first))
                      (expand-clauses rest env)
                      env)))))

(define (make-if predicate consequent alternative env)
   (if (eq? (cadr consequent) '=>)
       (let ((value (eval predicate env)))
         (list 'if value (lambda () ((caddr consequent) value)) alternative))
       (list 'if predicate consequent alternative)))
