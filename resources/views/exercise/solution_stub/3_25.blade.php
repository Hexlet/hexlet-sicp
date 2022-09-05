#lang racket/base
(require rackunit)
(require sicp)


;;; BEGIN
{!! $solution !!}
;;; END

(define t (make-table))

(insert! t '(a) 5)
(insert! t '(a b) 10)
(insert! t '(a b c) 42)

(check-equal? (lookup t '(a)) 5)
(check-equal? (lookup t '(a b)) 10)
(check-false (lookup t '(b)))
(check-equal? (lookup t '(a b c)) 42)
