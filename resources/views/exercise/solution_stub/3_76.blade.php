#lang sicp
(#%require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

(define (stream-car stream) (car stream))

(define (stream-cdr stream) (force (cdr stream)))

(define (stream-ref s n)
  (if (= n 0)
      (stream-car s)
      (stream-ref (stream-cdr s) (- n 1))))

(define sense-data (cons-stream 1
   (cons-stream 2 (cons-stream 1.5  (cons-stream 1  (cons-stream 0.5
   (cons-stream -0.1  (cons-stream -2  (cons-stream -3  (cons-stream -2
   (cons-stream -0.5  (cons-stream 0.2  (cons-stream 3 4)))))))))))))


(define s (smooth sense-data))

(check-equal? (stream-ref s 0) 3/2)
(check-equal? (stream-ref s 1) 1.75)
(check-equal? (stream-ref s 2) 1.25)
(check-equal? (stream-ref s 3) 0.75)
