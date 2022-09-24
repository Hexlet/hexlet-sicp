#lang racket/base
(require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

; Use mcar, mcdr, mcons, set-mcdr! ... in solution
; instead of car, cdr, cons, set-cdr! ...

(define q (make-queue))

((q 'insert-queue!) 'a)
(check-equal? (q 'front-queue) 'a)

((q 'insert-queue!) 'b)
(check-equal? (q 'front-queue) 'a)

(q 'delete-queue!)
(check-equal? (q 'front-queue) 'b)
