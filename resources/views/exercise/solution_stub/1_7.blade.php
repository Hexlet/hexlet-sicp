#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (round (* 1000 (sqrt 4.0))) 2000.0)
(check-equal? (round (* 1000 (sqrt 100.0))) 10000.0)
(check-equal? (round (* 1000 (sqrt 1000000.0))) 1000000.0)
(check-equal? (round (* 1000 (sqrt 0.04))) 200.0)
