#lang racket/base
(require rackunit)
(require sicp)


;;; BEGIN
{!! $solution !!}
;;; END


(define (stream-car stream) (car stream))

(define (stream-cdr stream) (force (cdr stream)))

(define (stream-enumerate-interval low high)
  (if (> low high)
      the-empty-stream
      (cons-stream
       low
       (stream-enumerate-interval (+ low 1) high))))



(define first-stream (stream-enumerate-interval 1 5))
(define second-stream (stream-enumerate-interval 6 10))

(define stream-sum (stream-map + first-stream second-stream))
(check-equal? (stream-car stream-sum) 7)
(check-equal? (stream-car (stream-cdr stream-sum)) 9)

(define stream-product (stream-map * first-stream second-stream))
(check-equal? (stream-car stream-product) 6)
(check-equal? (stream-car (stream-cdr stream-product)) 14)
