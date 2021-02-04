#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (solution 10 0) 1)
(check-equal? (solution 3 20) (expt 3 20))
(check-equal? (solution 2 10) (expt 2 10))
(check-equal? (solution 0 5) 0)
