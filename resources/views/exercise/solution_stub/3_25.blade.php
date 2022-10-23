#lang racket/base
(require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

(require compatibility/mlist)

(define (cons x pair) (mcons x pair))

(define (car x) (mcar x))

(define (cdr x) (mcdr x))

(define (cdadr x) (cdr (car (cdr x))))

(define (assoc v lst) (massoc v lst))

(define (set-cdr! tail pair) (set-mcdr! tail pair))

(define t (make-table))


(insert! t (mlist 'a) 5)
(insert! t (mlist 'a 'b) 10)
(insert! t (mlist 'a 'b 'c) 42)

(check-equal? (lookup t (mlist 'a)) 5)
(check-equal? (lookup t (mlist 'a 'b)) 10)
(check-false (lookup t (mlist 'b)))
(check-equal? (lookup t (mlist 'a 'b 'c)) 42)
