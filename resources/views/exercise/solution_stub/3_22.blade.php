#lang racket/base
(require rackunit)
(require sicp)


;;; BEGIN
{!! $solution !!}
;;; END

(define q (make-queue))

((q 'insert-queue!) 'a)
(check-equal? (q 'front-queue) 'a)

((q 'insert-queue!) 'b)
(check-equal? (q 'front-queue) 'a)

(q 'delete-queue!)
(check-equal? (q 'front-queue) 'b)
