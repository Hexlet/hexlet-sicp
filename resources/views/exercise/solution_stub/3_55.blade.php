#lang racket/base
(require rackunit)
(require sicp)


;;; BEGIN
{!! $solution !!}
;;; END

(define (stream-car stream) (car stream))

(define (stream-cdr stream) (force (cdr stream)))

(define (stream-ref s n)
  (if (= n 0)
      (stream-car s)
      (stream-ref (stream-cdr s) (- n 1))))

(define ones (cons-stream 1 ones))

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

(define (add-streams s1 s2)
  (stream-map + s1 s2))


(define integers (cons-stream 1 (add-streams ones integers)))


(check-equal? (stream-ref (partial-sums integers) 0) 1)
(check-equal? (stream-ref (partial-sums integers) 1) 3)
(check-equal? (stream-ref (partial-sums integers) 2) 6)
(check-equal? (stream-ref (partial-sums integers) 3) 10)

(check-equal? (stream-ref (partial-sums ones) 0) 1)
(check-equal? (stream-ref (partial-sums ones) 1) 2)
(check-equal? (stream-ref (partial-sums ones) 2) 3)
