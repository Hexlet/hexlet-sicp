#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (equal? '(this is a list) '(this is a list)) #t)
(check-equal? (equal? '(this is a list) '(this (is a) list)) #f)

(check-equal? (equal-proc? '(this is a list) '(this is a list)) #t)
(check-equal? (equal-proc? '(this is a list) '(this (is a) list)) #f)
