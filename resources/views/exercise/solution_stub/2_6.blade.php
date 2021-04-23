#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define zero (lambda (f) (lambda (x) x)))

(define (add-1 n)
  (lambda (f) (lambda (x) (f ((n f) x)))))

(define (inc x) (+ x 1))

(define (church->nat n) ((n inc) 0))


(check-equal? (church->nat zero) 0)
(check-equal? (church->nat one) 1)
(check-equal? (church->nat two) 2)
(check-equal? (church->nat (add one one)) 2)
(check-equal? (church->nat (add two one)) 3)
(check-equal? (church->nat (add (add two one) zero)) 3) 
(check-equal? (church->nat (add (add two one) one)) 4)
