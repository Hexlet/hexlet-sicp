#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define tolerance 0.00001)

(define (fixed-point f first-guess)
  (define (close-enough? v1 v2)
    (< (abs (- v1 v2)) tolerance))
  (define (try guess)
    (let ((next (f guess)))
      (if (close-enough? guess next)
          next
          (try next))))
  (try first-guess))


(define (deriv g)
  (lambda (x)
    (/ (- (g (+ x tolerance)) (g x))
       tolerance)))

(define (newton-transform g)
  (lambda (x)
    (- x (/ (g x) ((deriv g) x)))))

(define (newtons-method g guess)
  (fixed-point (newton-transform g) guess))


(check-equal? (round (newtons-method (cubic 0 0 0) 1)) 0.0)
(check-equal? (round (newtons-method (cubic 0 0 (- 27)) 10)) 3.0)
(check-equal? (round (newtons-method (cubic 0 0 (- 81)) 10)) 4.0)
(check-equal? (round (newtons-method (cubic 2 8 (- 32)) 10)) 2.0)
