#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END


(check-equal? (deriv '(* x y) 'x) 'y)
(check-equal? (deriv '(* x y (+ x 3)) 'x) '(+ (* x y) (* y (+ x 3))))
