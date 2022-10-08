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

(define (scale-stream stream factor)
  (stream-map (lambda (x) (* x factor)) stream))

(define (add-streams s1 s2)
  (stream-map + s1 s2))

(define (mul-streams s1 s2)
    (stream-map * s1 s2))

(define (div-streams s1 s2)
    (stream-map / s1 s2))

(define ones (cons-stream 1 ones))

(define integers (cons-stream 1 (add-streams ones integers)))

(define (integrate-series s)
              (stream-map /  s integers))

(define exp-series
  (cons-stream 1 (integrate-series exp-series)))

(check-equal? (! (stream-ref (invert-unit-series exp-series) 0)) 1)
(check-equal? (! (stream-ref (invert-unit-series exp-series) 1)) -1)
(check-equal? (! (stream-ref (invert-unit-series exp-series) 2)) 1/2)
