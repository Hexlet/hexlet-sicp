#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (make-rat 1 2) '(1 . 2))
(check-equal? (make-rat (- 1) 2) '(-1 . 2))
(check-equal? (make-rat (- 1) (- 2)) '(1 . 2))
(check-equal? (make-rat 1 (- 2)) '(-1 . 2))
(check-equal? (make-rat 2 4) '(1 . 2))
