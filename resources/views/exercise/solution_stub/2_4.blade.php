#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (cons x y)
  (lambda (m) (m x y)))

(define (car z)
  (z (lambda (p q) p)))

(define example (cons 1 2))

(check-equal? (car example) 1)
(check-equal? (cdr example) 2)
(check-equal? (cdr (cons 5 15)) 15)
