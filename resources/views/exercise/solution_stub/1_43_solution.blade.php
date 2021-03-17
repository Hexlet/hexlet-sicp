(define (compose f g)
  (lambda (y) (f (g y))))

(define (repeated f x)
  (lambda (y) ((repeated-iter f f x) y)))

(define (repeated-iter f g x)
  (cond ((= x 1)  f)
        ((> x 1) (repeated-iter (compose f g) g (- x 1)))))
