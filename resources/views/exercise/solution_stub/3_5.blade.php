#lang racket/base

(require rackunit)
(require sicp)


;;; BEGIN
{!! $solution !!}
;;; END

(define (monte-carlo trials experiment)
  (define (iter trials-remaining trials-passed)
    (cond ((= trials-remaining 0)
           (/ trials-passed trials))
          ((experiment)
           (iter (- trials-remaining 1) (+ trials-passed 1)))
          (else
           (iter (- trials-remaining 1) trials-passed))))
  (iter trials 0))


(define (random-in-range low high)
    (let ((range (- high low)))
        (+ low (random range))))


(define (square x) (* x x))

(define (square-predicate? x y)
  (< (+ (square x)
        (square y))
  1.0))

(define (test-pi trials)
  (exact->inexact
  (estimate-integral square-predicate? -1.0 1.0 -1.0 1.0 trials)))


(check-equal? (floor (* 10 (test-pi 1000))) 31.0)
(check-equal? (floor (* 10 (test-pi 10000))) 31.0)
