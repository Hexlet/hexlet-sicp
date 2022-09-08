#lang racket/base
(require rackunit)
(require sicp)


;;; BEGIN
{!! $solution !!}
;;; END

(define table-equal (make-table equal?))
(define get-equal (table-equal 'lookup-proc))
(define put-equal (table-equal 'insert-proc!))

(put-equal 1 2 42)
(check-equal? (get-equal 1 2) 42)
(check-false (get-equal 1 2.0000001))


(define (same-key-epsilon? epsilon)
  (lambda (x y) 
      (if (< (abs (- x y)) epsilon) #t
          #f)))

(define table-epsilon (make-table (same-key-epsilon? 0.1)))
(define get-epsilon (table-epsilon 'lookup-proc))
(define put-epsilon (table-epsilon 'insert-proc!))

(put-epsilon 1 2 42)
(check-equal? (get-epsilon 1 2) 42)
(check-equal? (get-epsilon 1 2.001) 42)
(check-equal? (get-epsilon 1.01 2.01001) 42)
(check-false (get-epsilon 1.2 2.1))
