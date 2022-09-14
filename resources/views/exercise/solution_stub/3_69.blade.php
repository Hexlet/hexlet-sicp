#lang racket
(require rackunit)
(require sicp)


;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (stream-ref s 0) '(1 1 1))
(check-equal? (stream-ref s 1) '(1 1 2))
(check-equal? (stream-ref s 2) '(2 2 2))
(check-equal? (stream-ref s 3) '(1 1 3))

(check-equal? (stream-ref pythagorean-triples 0) '(3 4 5))
(check-equal? (stream-ref pythagorean-triples 1) '(6 8 10))
