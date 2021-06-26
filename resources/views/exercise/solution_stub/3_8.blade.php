#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define f (make-f))

(define left f)

(check-equal? (+ (left 0) (left 1)) 0)

(define right (make-f))

(check-equal? (+ (right 1) (right 0)) 1) 
