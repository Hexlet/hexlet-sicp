#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define acc (make-account 100 'secret-password))

(check-equal? ((acc 'secret-password 'withdraw) 40) 60)
(check-equal? ((acc 'secret-password 'deposit) 40) 100)
