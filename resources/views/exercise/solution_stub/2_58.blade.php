#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END


(check-equal? (deriv '(x * 2) 'x) 2)
(check-equal? (deriv '(x * y) 'x) 'y)
(check-equal? (deriv '(2 * x + y) 'x) 2)
(check-equal? (deriv '((2 * x) + (3 * x) + 1) 'x) 5)
