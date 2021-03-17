#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define l (list 1 2 3))

(check-equal? (subsets l) '(() (3) (2) (2 3) (1) (1 3) (1 2) (1 2 3)))
