#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define x '(1 3 5 8))
(define y '(0 1 2 4 9))

(check-equal? (union-set x y) '(0 1 2 3 4 5 8 9))
(check-equal? (union-set x y) (union-set y x))
(check-equal? (union-set '() y) y)
(check-equal? (union-set x '()) x)
(check-equal? (union-set x x) x)
