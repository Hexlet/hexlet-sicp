#lang racket
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (tan-cf (/ pi 4) 100) 1.0)
(check-equal? (tan-cf 0 10) 0)
(check-equal? (round (* 100 (tan-cf (/ pi 3) 100))) 173.0)
