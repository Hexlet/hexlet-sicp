#lang sicp
(#%require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

(define (stream-car stream) (car stream))

(define (stream-cdr stream) (force (cdr stream)))

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

(define (stream-ref s n)
  (if (= n 0)
      (stream-car s)
      (stream-ref (stream-cdr s) (- n 1))))


(define test-stream (cons-stream 'generate
                    (cons-stream 'generate
                    (cons-stream 'generate '()))))


                                                        
(define s0 (random-numbers test-stream))

(define test-reset-stream (cons-stream (stream-ref s0 0)
                          (cons-stream 'generate
                          (cons-stream 'generate
                          (cons-stream 'generate
                          (cons-stream 'generate '()))))))

(define s1 (random-numbers test-reset-stream))

(check-equal? (stream-ref s0 0) (stream-ref s1 0))
(check-equal? (stream-ref s0 0) (stream-ref s1 1))
(check-equal? (stream-ref s0 1) (stream-ref s1 2))
(check-equal? (stream-ref s0 2) (stream-ref s1 3))
