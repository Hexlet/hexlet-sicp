#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END


(check-equal? (attach-tag 'scheme-number 42) 42)
(check-equal? (attach-tag 'complex (cons 1 2)) (cons 'complex (cons 1 2)))
(check-equal? (contents 42) 42)
(check-equal? (contents (cons 'complex (cons 1 2))) (cons 1 2))
(check-equal? (type-tag (cons 'complex (cons 1 2))) 'complex)
(check-equal? (type-tag 10) 'scheme-number)
