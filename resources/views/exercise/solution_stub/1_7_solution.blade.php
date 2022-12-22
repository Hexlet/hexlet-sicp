(define (sqr x) (* x x))

(define (average x y) (/ (+ x y) 2))

(define (improve guess x)
  (average guess (/ x guess)))

(define (good-enough? guess x)
  (< (abs (- (sqr guess) x)) 
     (* 0.0000001 guess)))

(define (sqrt-iter guess x)
  (if (good-enough? guess x)
      guess
      (sqrt-iter (improve guess x) x)))

(define (square-root x)
  (sqrt-iter 1.0 x))
