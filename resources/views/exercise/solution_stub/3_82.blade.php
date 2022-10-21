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

(define (sicp-random n)
  (if (and (exact? n) (integer? n))
      (random n)
      (* n (random))))

(define (random-in-range low high)
   (let ((range (- high low)))
     (+ low (sicp-random range))))

(define (monte-carlo experiment-stream passed failed)
  (define (next passed failed)
    (cons-stream
     (/ passed (+ passed failed))
     (monte-carlo
      (stream-cdr experiment-stream) passed failed)))
  (if (stream-car experiment-stream)
      (next (+ passed 1) failed)
      (next passed (+ failed 1))))

(define (in-unit-circle? x y) 
   (<= (+ (expt (- x 0.5) 2) 
          (expt (- y 0.5) 2)) 
       (expt 0.5 2))) 


(define pi-stream
   (stream-map (lambda (area) (/ area (* 0.5 0.5))) 
               (estimate-integral in-unit-circle? 0.0 1.0 0.0 1.0)))

(check-equal? (! (floor (* 10 (exact->inexact (stream-ref pi-stream 10000))))) 31.0)
