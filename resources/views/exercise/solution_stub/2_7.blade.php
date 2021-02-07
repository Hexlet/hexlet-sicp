#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (make-interval a b)
  (cons a b))

(define lower 5)

(define upper 10)

(define interval (make-interval lower upper))

(check-equal? (lower-bound interval) lower)
(check-equal? (upper-bound interval) upper)
