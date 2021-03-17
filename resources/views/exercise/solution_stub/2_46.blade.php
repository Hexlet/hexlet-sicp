#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define vec1 (make-vect 1.0 2.0))
(define vec2 (make-vect 0.5 0.5))

(check-equal? (xcor-vect vec1) 1.0)
(check-equal? (ycor-vect vec2) 0.5)
(check-equal? (add-vect vec1 vec2) (make-vect 1.5 2.5))
(check-equal? (sub-vect vec1 vec2) (make-vect 0.5 1.5))
(check-equal? (scale-vect 2 vec2) (make-vect 1.0 1.0))
