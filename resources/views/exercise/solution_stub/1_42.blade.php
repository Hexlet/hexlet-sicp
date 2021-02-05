#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (inc x)
  (+ x 1))

(define (square x)
  (* x x))

(define (double x)
  (* x 2))

(check-equal? ((compose square inc) 6) 49)
(check-equal? ((compose inc double) 6) 13)
(check-equal? ((compose double inc) 6) 14)
