#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define pi 3.141592653589793)

(check-equal? (tan-cf (/ pi 4) 100) 1.0)
(check-equal? (tan-cf 0 10) 0)
(check-equal? (round (* 100 (tan-cf (/ pi 3) 100))) 173.0)
