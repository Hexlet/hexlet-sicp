#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (fast-mul 1 1) 1)
(check-equal? (fast-mul 40 30) (* 40 30))
(check-equal? (fast-mul 5 0) 0)
(check-equal? (fast-mul 5 15) (* 5 15))
