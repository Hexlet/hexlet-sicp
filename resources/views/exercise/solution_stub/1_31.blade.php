#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (inc n) (+ n 1))

(define (square x) (* x x))

(define (identity x) x)

(check-equal? (product square 1 inc 3) 36)
(check-equal? (product identity 3 inc 5) 60)
(check-equal? (factorial 5) 120)
