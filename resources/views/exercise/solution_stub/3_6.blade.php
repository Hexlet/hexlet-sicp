#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define random-value (rand 'generate))
(define test-value-1 (rand 'generate))
(define test-value-2 (rand 'generate))
(define test-value-3 (rand 'generate))

((rand 'reset) random-value)

(check-equal? test-value-1 (rand 'generate))
(check-equal? test-value-2 (rand 'generate))
(check-equal? test-value-3 (rand 'generate))
