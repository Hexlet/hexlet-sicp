#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (inc n) (+ n 1))

(define (square x) (* x x))

(define (identity x) x)

(check-equal? (filtered-accumulate * 1 square 1 inc 3 odd?) 9)
(check-equal? (filtered-accumulate * 1 identity 3 inc 5 odd?) 15)
(check-equal? (filtered-accumulate + 0 identity 1 inc 10 odd?) 25)
