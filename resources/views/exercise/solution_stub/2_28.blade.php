#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define x (list (list 1 2) (list 3 4)))
(define y (list x x))

(check-equal? (fringe x) (list 1 2 3 4))
(check-equal? (fringe y) '(1 2 3 4 1 2 3 4))
