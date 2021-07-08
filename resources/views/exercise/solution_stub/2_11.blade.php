#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (make-interval a b)
  (cons a b))

(define (lower-bound interval)
  (car interval))

(define (upper-bound interval)
  (cdr interval))


(define interval (make-interval -5 15))
(define interval2 (make-interval 5 10))
(define interval3 (make-interval 6 8))

(define result1 (mul-interval interval interval2))
(define result2 (mul-interval interval2 interval))
(define result3 (mul-interval interval2 interval3))

(check-equal? result1 result2)
(check-equal? result3 '(30 . 80))
