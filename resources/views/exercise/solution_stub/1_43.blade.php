#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (square x)
  (* x x))

(define (inc x)
  (+ x 1))

(check-equal? ((repeated square 1) 6) 36)
(check-equal? ((repeated square 2) 5) 625)
(check-equal? ((repeated inc 10) 10) 20)
