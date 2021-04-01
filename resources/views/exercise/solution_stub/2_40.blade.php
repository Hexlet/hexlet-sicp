#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (unique-pairs 2) '((2 1)))
(check-equal? (length (unique-pairs 2)) 1)
(check-equal? (length (unique-pairs 3)) 3)
(check-equal? (length (unique-pairs 6)) 15)
