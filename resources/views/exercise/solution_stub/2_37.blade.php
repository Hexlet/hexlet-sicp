#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define m (list (list 1 2)
                (list 3 4)))

(define m2 '((1 2 3 4)
             (4 5 6 6)
             (6 7 8 9)))

(define m2-transpose '((1 4 6)
                       (2 5 7)
                       (3 6 8)
                       (4 6 9)))

(define v (list 1 2))

(define x1 (list 2 3))

(define x2 (list 3 2))

(check-equal? (dot-product v x1) 8)
(check-equal? (dot-product v x2) 7)
(check-equal? (matrix-*-vector m v) (list 5 11))

(check-equal? (transpose m) (list (list 1 3)
                                  (list 2 4)))

(check-equal? (transpose m2) m2-transpose)

(check-equal? (matrix-*-matrix m m) '((7 10)
                                      (15 22)))
