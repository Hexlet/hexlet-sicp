#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (round (* 100 (fixed-point cos 1.0))) 74.0)
(check-equal? (round (* 100 (fixed-point (lambda (y) (+ (sin y) (cos y))) 1.0))) 126.0)
