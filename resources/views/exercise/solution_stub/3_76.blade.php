#lang racket/base
(require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

(require lazy)
(require lazy/force)

(define (cons-stream x s) (cons x s))

(define (stream-car stream) (car stream))

(define (stream-cdr stream) (! (cdr stream)))

(define (stream-ref s n)
  (if (= n 0)
      (stream-car s)
      (stream-ref (stream-cdr s) (- n 1))))

(define (stream-map proc . list-of-stream)
    (if (null? (car list-of-stream))
        '()
        (cons-stream
            (apply proc 
                   (map (lambda (s)
                            (stream-car s))
                        list-of-stream))
            (apply stream-map 
                   (cons proc (map (lambda (s)
                                       (stream-cdr s))
                                   list-of-stream))))))

(define sense-data (cons-stream 1
   (cons-stream 2 (cons-stream 1.5  (cons-stream 1  (cons-stream 0.5
   (cons-stream -0.1  (cons-stream -2  (cons-stream -3  (cons-stream -2
   (cons-stream -0.5  (cons-stream 0.2  (cons-stream 3 4)))))))))))))


(define s (smooth sense-data))

(check-equal? (! (stream-ref s 0)) 3/2)
(check-equal? (! (stream-ref s 1)) 1.75)
(check-equal? (! (stream-ref s 2)) 1.25)
(check-equal? (! (stream-ref s 3)) 0.75)
