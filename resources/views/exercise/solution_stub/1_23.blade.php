#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (next 2) 3)
(check-equal? (next 3) 5)
(check-equal? (next 4) 6)
(check-equal? (smallest-divisor 4) 2)
(check-equal? (smallest-divisor 21) 3)
(check-equal? (smallest-divisor 1999) 1999)
