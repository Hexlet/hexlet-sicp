#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (solution 1 1) 1)
(check-equal? (solution 40 30) (* 40 30))
(check-equal? (solution 5 0) 0)
(check-equal? (solution 5 15) (* 5 15))
