#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (exponentiation? '(** x 3)) #t)
(check-equal? (exponentiation? '(+ x 3)) #f)
(check-equal? (make-exponentiation 'x 2) '(** x 2))
(check-equal? (exponent '(** x 3)) 3)
(check-equal? (base '(** (+ x 1) 3)) '(+ x 1))
(check-equal? (deriv '(** x 3) 'x) '(* 3 (** x 2)))
(check-equal? (make-exponentiation 'x 0) 1)
(check-equal? (make-exponentiation '(+ (/ x y) 4) 1) '(+ (/ x y) 4))
