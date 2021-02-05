(define (compose f g)
  (lambda (y) (f (g y))))
