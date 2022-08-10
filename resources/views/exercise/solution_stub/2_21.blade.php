#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define test-list (list 3 5 7 8 21 4))
(define nil '())

(check-equal? (square-list (list 1 2 3 4)) (list 1 4 9 16))
(check-equal? (square-list test-list) (square-list2 test-list))
