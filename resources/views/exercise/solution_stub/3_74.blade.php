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
   (cons-stream -0.5  (cons-stream 0.2  (cons-stream 3 (cons-stream 4 '()))))))))))))))


(check-equal? (! (stream-ref zero-crossings 0)) 0)
(check-equal? (! (stream-ref zero-crossings 1)) 0)
(check-equal? (! (stream-ref zero-crossings 2)) 0)
(check-equal? (! (stream-ref zero-crossings 3)) 0)
(check-equal? (! (stream-ref zero-crossings 4)) 0)
(check-equal? (! (stream-ref zero-crossings 5)) 1)
(check-equal? (! (stream-ref zero-crossings 6)) 0)
(check-equal? (! (stream-ref zero-crossings 7)) 0)
(check-equal? (! (stream-ref zero-crossings 8)) 0)
(check-equal? (! (stream-ref zero-crossings 9)) 0)
(check-equal? (! (stream-ref zero-crossings 10)) -1)
(check-equal? (! (stream-ref zero-crossings 11)) 0)
(check-equal? (! (stream-ref zero-crossings 12)) 0)
