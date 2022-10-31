(define (let*? expr) (tagged-list? expr 'let*))

(define (let*-body expr) (caddr expr))

(define (let*-inits expr) (cadr expr))

(define (let*->nested-lets expr)
         (let ((inits (let*-inits expr))
                   (body (let*-body expr)))
                 (define (make-lets exprs)
                         (if (null? exprs)
                                 body
                                 (list 'let (list (car exprs)) (make-lets (cdr exprs)))))
                 (make-lets inits)))
