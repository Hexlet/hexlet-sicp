#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define x (cons (list 1 2) (list 3 4)))


(check-equal? (count-leaves (list 1 2 (list 3 (list 4 5)))) 5)
(check-equal? (count-leaves (list x x)) 8)
