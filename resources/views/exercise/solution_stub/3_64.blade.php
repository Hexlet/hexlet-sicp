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

(define (average x y)
  (/ (+ x y) 2))

(define (sqrt-improve guess x)
  (average guess (/ x guess)))

(define (close-enough? x y tolerance)
    (< (abs (- x y))
       tolerance))

(define (sqrt-stream x)
  (define guesses
    (cons-stream 1.0
                 (stream-map (lambda (guess)
                               (sqrt-improve guess x))
                             guesses)))
  guesses)

(define (sqrt x tolerance)
  (stream-limit (sqrt-stream x) tolerance))


(check-equal? (! (floor (* 1000 (sqrt 4 0.001)))) 2000.0)
(check-equal? (! (floor (* 1000 (sqrt 100 0.0001)))) 10000.0)
(check-equal? (! (floor (* 1000 (sqrt 0.09 0.0001)))) 300.0)
