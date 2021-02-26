#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define first '(1 2 3 5))
(define second '(3 4 5 6))

(check-equal? (union-set first second) '(6 4 1 2 3 5))
(check-equal? (union-set first '()) first)
(check-equal? (union-set '() second) second)
