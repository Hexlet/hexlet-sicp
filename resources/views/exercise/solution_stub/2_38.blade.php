#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define nil '())
(define example (list 1 2 3))

(check-equal? (fold-right / 1 example) 3/2)
(check-equal? (fold-left / 1 example) 1/6)
(check-equal? (fold-right list '() example) '(1 (2 (3 ()))))
(check-equal? (fold-left list '() example) '(((() 1) 2) 3))
(check-equal? (fold-right + 0 example) (fold-left + 0 example))
(check-equal? (fold-right * 1 example) (fold-left * 1 example))
