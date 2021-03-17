#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (f 5) 11)
(check-equal? (f-iter 5) 11)
(check-equal? (f 3) 3)
(check-equal? (f-iter 1) 1)
