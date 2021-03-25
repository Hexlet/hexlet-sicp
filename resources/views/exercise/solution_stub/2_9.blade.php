#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (make-interval a b)
  (cons a b))

(define (lower-bound interval)
  (car interval))

(define (upper-bound interval)
  (cdr interval))


(define (add-interval a b)
  (make-interval (+ (lower-bound a) (lower-bound b))
                 (+ (upper-bound a) (upper-bound b))))

(define (mul-interval x y)
  (let ((p1 (* (lower-bound x) (lower-bound y)))
        (p2 (* (lower-bound x) (upper-bound y)))
        (p3 (* (upper-bound x) (lower-bound y)))
        (p4 (* (upper-bound x) (upper-bound y))))
    (make-interval (min p1 p2 p3 p4)
                   (max p1 p2 p3 p4))))

(define (div-interval x y)
  (mul-interval x 
                (make-interval (/ 1.0 (upper-bound y))
                               (/ 1.0 (lower-bound y)))))

(define u 15)
(define l -5)

(define u2 10)
(define l2 5)

(define interval (make-interval l u))
(define interval2 (make-interval l2 u2))

(define interval-add (add-interval interval interval2))

(define interval-mul (mul-interval interval interval2))

(define interval-div (div-interval interval interval2))


(check-equal? (width interval) (/ (abs(- l u)) 2))

(check-equal? (width interval-add) (+ (width interval)
                                      (width interval2)))

(check-not-equal? (width interval-mul) (* (width interval)
                                          (width interval2)))

(check-not-equal? (width interval-div) (/ (width interval)
                                          (width interval2)))
