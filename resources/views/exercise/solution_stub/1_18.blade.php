#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (mul-iter 1 1) 1)
(check-equal? (mul-iter 40 30) (* 40 30))
(check-equal? (mul-iter 5 0) 0)
(check-equal? (mul-iter 5 15) (* 5 15))
