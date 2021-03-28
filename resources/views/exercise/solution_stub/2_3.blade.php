#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (make-point x y)
  (cons x y))

(define start-point (make-point 0 0))

(define rectangle (make-rectangle start-point 2 3))

(check-equal? (rectangle-square rectangle) 6)
(check-equal? (rectangle-perimeter rectangle) 10)
