#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (make-interval a b)
  (cons a b))

(define lower1 5)

(define lower2 15)

(define upper1 10)

(define upper2 25)

(define interval1 (make-interval lower1 upper1))

(define interval2 (make-interval lower2 upper2))

(check-equal?  (sub-interval interval1 interval2) '(-20 . -5))
(check-equal?  (sub-interval interval2 interval1) '(5 . 20))
