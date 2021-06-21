#lang sicp
(#%require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

(define (stream-car stream) (car stream))

(define (stream-cdr stream) (force (cdr stream)))

(define sense-data (cons-stream 1
   (cons-stream 2 (cons-stream 1.5  (cons-stream 1  (cons-stream 0.5
   (cons-stream -0.1  (cons-stream -2  (cons-stream -3  (cons-stream -2
   (cons-stream -0.5  (cons-stream 0.2  (cons-stream 3 4)))))))))))))


(define s (smooth sense-data))

(check-equal? (stream-car s) 3/2)
(check-equal? (stream-car (stream-cdr s)) 1.75)
(check-equal? (stream-car (stream-cdr (stream-cdr s))) 1.25)
(check-equal? (stream-car (stream-cdr (stream-cdr (stream-cdr s)))) 0.75)
