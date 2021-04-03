#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (make-triple-sum 4 6) '((3 2 1)))
(check-equal? (make-triple-sum 3 6) '((3 2 1)))
(check-equal? (length (make-triple-sum 9 9)) 3)
