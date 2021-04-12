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


(check-equal? (round (* 10000 (fixed-point solution 1.0))) 16180.0)
