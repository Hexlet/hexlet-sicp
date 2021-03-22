#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (root3 x) ((nth-root 3) x))

(define (root4 x) ((nth-root 4) x))


(check-equal? (round (root3 27)) 3.0)
(check-equal? (round (root3 64)) 4.0)
(check-equal? (round (root4 81)) 3.0)
(check-equal? (round (root4 10000)) 10.0)
