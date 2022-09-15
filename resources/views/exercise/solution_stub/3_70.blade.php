#lang racket/base
(require rackunit)
(require sicp)


;;; BEGIN
{!! $solution !!}
;;; END

(define (stream-car stream) (car stream))

(define (stream-cdr stream) (force (cdr stream)))

(define (stream-ref s n)
  (if (= n 0)
      (stream-car s)
      (stream-ref (stream-cdr s) (- n 1))))

(define (stream-map proc . list-of-stream)
    (if (null? (car list-of-stream))
        '()
        (cons-stream
            (apply proc 
                   (map (lambda (s)
                            (stream-car s))
                        list-of-stream))
            (apply stream-map 
                   (cons proc (map (lambda (s)
                                       (stream-cdr s))
                                   list-of-stream))))))


(define (add-streams s1 s2)
  (stream-map + s1 s2))

(define ones (cons-stream 1 ones))

(define integers (cons-stream 1 (add-streams ones integers)))

(define nat-stream-1 (weighted-pairs integers integers +))

(check-equal? (stream-ref nat-stream-1 0) '(1 . 1))
(check-equal? (stream-ref nat-stream-1 1) '(1 . 2))
(check-equal? (stream-ref nat-stream-1 2) '(1 . 3))
(check-equal? (stream-ref nat-stream-1 3) '(2 . 2))
(check-equal? (stream-ref nat-stream-1 4) '(1 . 4))
(check-equal? (stream-ref nat-stream-1 5) '(2 . 3))

(define nat-stream-2
  (weighted-pairs integers integers
                  (lambda (i j) (+ (* 2 i) (* 3 j) (* 5 i j)))))

(check-equal? (stream-ref nat-stream-2 0) '(1 . 1))
(check-equal? (stream-ref nat-stream-2 1) '(1 . 2))
(check-equal? (stream-ref nat-stream-2 2) '(1 . 3))
(check-equal? (stream-ref nat-stream-2 3) '(2 . 2))
(check-equal? (stream-ref nat-stream-2 4) '(1 . 4))
(check-equal? (stream-ref nat-stream-2 5) '(1 . 5))
