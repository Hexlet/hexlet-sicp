#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define nil '())
(define example (list 1 2 3 4 5))

(check-equal? (reverse-right example) (list 5 4 3 2 1))
(check-equal? (reverse-left example) (reverse-right example))
