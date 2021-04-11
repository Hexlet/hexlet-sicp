#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (fib 1) 1)
(check-equal? (fib 2) 1)
(check-equal? (fib 7) 13)
(check-equal? (fib 8) 21)
