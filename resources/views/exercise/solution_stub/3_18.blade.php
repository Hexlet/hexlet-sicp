#lang racket/base
(require rackunit)
(require compatibility/mlist)

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

(define z (make-cycle (mlist 'a 'b 'c)))


(check-equal? (cycle? z) #t)
(check-equal? (cycle? (mlist 1 2 3)) #f)
