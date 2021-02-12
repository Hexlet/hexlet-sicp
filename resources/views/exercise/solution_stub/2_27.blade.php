#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define x (list (list 1 2) (list 3 4)))
(define y '((1 2)(3 4)(5 6)))

(check-equal? (deep-reverse x) (list (list 4 3) (list 2 1)))
(check-equal? (deep-reverse y) '((6 5)(4 3)(2 1)))
