#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END


(check-equal? (horner-eval 1 (list 1 3 0 5 0 1)) 10)
(check-equal? (horner-eval 2 (list 1 3 0 5 0 1)) 79)
(check-equal? (horner-eval 2 (list 1 3 1 5 0 1)) 83)
