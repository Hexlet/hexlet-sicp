#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define first '(1 2 3 5 3))
(define second '(3 4 5 6 5))

(check-equal? (union-set first second) '(5 6 5 4 3 1 2 3 5 3))
(check-equal? (intersection-set first second) '(3 5 3))
(check-equal? (intersection-set second first) '(3 5 5))
