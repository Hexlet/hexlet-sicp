#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (cube x) (* x x x))

(check-equal? (round (* 100 (simpson cube 0 1 100))) 25.0)
(check-equal? (round (* 100 (simpson cube 0 1 1000))) 25.0)
(check-equal? (floor (* 1000 (simpson cube 0 1 100))) 249.0)
(check-equal? (floor (* 1000 (simpson cube 0 1 1000))) 250.0)
