#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (last-pair (list 1 2 3 4)) 4)
(check-equal? (last-pair '(4 8 12 16 1)) 1)
(check-equal? (last-pair (list 23 72 149 34)) 34)
