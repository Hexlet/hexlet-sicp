#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define p1 (cons 'a nil))
(define p2 (cons p1 nil))
(define p3 (cons p1 p2))
(define p4 (cons p2 p1))
(define p5 (cons p1 p1))
(define p6 (cons p5 p5))


(check-equal? (count-pairs p3) 3)
(check-equal? (count-pairs p4) 3)
(check-equal? (count-pairs p6) 3)
(check-equal? (count-pairs '()) 0)
