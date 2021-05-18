#lang racket/base
(require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

(define t (make-table))

(insert! '(a) 5 t)
(insert! '(a b) 10 t)
(insert! '(a b c) 42 t)

(check-equal? (lookup '(a) t) 5)
(check-equal? (lookup '(a b) t) 10)
(check-false (lookup '(b) t))
(check-equal? (lookup '(a b c) t) 42)
