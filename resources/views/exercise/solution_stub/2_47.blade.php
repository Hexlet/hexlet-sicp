#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (make-vect x y)
  (cons x y))

(define (make-frame-list origin edge1 edge2)
  (list origin edge1 edge2))

(define (make-frame-cons origin edge1 edge2)
  (cons origin (cons edge1 edge2)))

(define origin-vect (make-vect 1.0 0.5))

(define edge1-vect (make-vect 0.0 1.0))

(define edge2-vect (make-vect 1.0 0.0))

(define x (make-frame-list origin-vect edge1-vect edge2-vect))

(define y (make-frame-cons origin-vect edge1-vect edge2-vect))


(check-equal? (origin-list x) (origin-cons y))
(check-equal? (edge1-list x) (edge1-cons y))
(check-equal? (edge2-list x) (edge2-cons y))
