#lang racket/base
(require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

(define (sicp-random n)
  (if (and (exact? n) (integer? n))
      (random n)
      (* n (random))))

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
        (+ low (sicp-random range))))


(define (square x) (* x x))

(define (square-predicate? x y)
  (< (+ (square x)
        (square y))
  1.0))

(define (test-pi trials)
  (exact->inexact
  (estimate-integral square-predicate? -1.0 1.0 -1.0 1.0 trials)))


(define attempt (floor (* 10 (test-pi 10000))))

(check-true (or
             (>= attempt 30.0)
             (<= attempt 32.0)))
