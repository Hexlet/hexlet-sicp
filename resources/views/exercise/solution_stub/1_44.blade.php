#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (square x)
  (* x x))

(define (cube x)
  (* x x x))

(check-equal? (round ((smooth square) 3)) 9.0)
(check-equal? (round ((smooth cube) 10)) 1000.0)
