#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (f 4) 11)
(check-equal? (f-iter 4) 11)
(check-equal? (f 3) 4)
(check-equal? (f-iter 1) 1)
