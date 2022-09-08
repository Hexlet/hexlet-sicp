#lang racket/base
(require rackunit)
(require sicp)

;;; BEGIN
{!! $solution !!}
;;; END

(define (last-pair x)
  (if (null? (mcdr x))
      x
      (last-pair (mcdr x))))

(define (make-cycle x)
  (set-mcdr! (last-pair x) x)
  x)

(define z (make-cycle (list 'a 'b 'c)))


(check-equal? (cycle? z) #t)
(check-equal? (cycle? (list 1 2 3)) #f)
