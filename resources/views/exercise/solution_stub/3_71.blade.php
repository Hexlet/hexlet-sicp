#lang racket/base
(require rackunit)
(require sicp)


;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (stream-car ramanujan-numbers) 1729)
(check-equal? (stream-car (stream-cdr ramanujan-numbers)) 4104)
