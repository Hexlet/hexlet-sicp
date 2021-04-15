#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define a 2)
(define b 3)
(define x (cons a b))
(define x2 (cons 0 1))
(define x3 (cons 1 0))

(check-equal? x 108)
(check-equal? x2 3)
(check-equal? x3 2)
(check-equal? (car x) a)
(check-equal? (cdr x) b)
(check-equal? (car x2) 0)
(check-equal? (cdr x2) 1)
(check-equal? (car x3) 1)
(check-equal? (cdr x3) 0)
