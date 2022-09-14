#lang racket
(require rackunit)
(require sicp)


;;; BEGIN
{!! $solution !!}
;;; END

(define s (triples integers integers integers))

(define (stream-ref s n)
  (if (= n 0)
      (stream-car s)
      (stream-ref (stream-cdr s) (- n 1))))

(check-equal? (stream-ref s 0) '(1 1 1))
(check-equal? (stream-ref s 1) '(1 1 2))
(check-equal? (stream-ref s 2) '(2 2 2))
(check-equal? (stream-ref s 3) '(1 1 3))

(check-equal? (stream-ref pythagorean-triples 0) '(3 4 5))
(check-equal? (stream-ref pythagorean-triples 1) '(6 8 10))
