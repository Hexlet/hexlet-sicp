#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define first '(1 0 5 2 9))
(define second '(10 1 19 5 50))

(check-equal? (union-set first second) '(0 2 9 10 1 19 5 50))
(check-equal? (union-set first '()) first)
(check-equal? (union-set '() second) second)
