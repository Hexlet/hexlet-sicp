#lang sicp
(#%require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

(define (stream-car stream) (car stream))

(define (stream-cdr stream) (force (cdr stream)))

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


(define scar stream-car)
(define scdr stream-cdr)

(define nat-stream-1 (weighted-pairs integers integers +))

(check-equal? (scar nat-stream-1) '(1 . 1))
(check-equal? (scar (scdr nat-stream-1)) '(1 . 2))
(check-equal? (scar (scdr (scdr nat-stream-1))) '(1 . 3))
(check-equal? (scar (scdr (scdr (scdr nat-stream-1)))) '(2 . 2))
(check-equal? (scar (scdr (scdr (scdr (scdr nat-stream-1))))) '(1 . 4))
(check-equal? (scar (scdr (scdr (scdr (scdr (scdr nat-stream-1)))))) '(2 . 3))

(define nat-stream-2
  (weighted-pairs integers integers
                  (lambda (i j) (+ (* 2 i) (* 3 j) (* 5 i j)))))

(check-equal? (scar nat-stream-2) '(1 . 1))
(check-equal? (scar (scdr nat-stream-2)) '(1 . 2))
(check-equal? (scar (scdr (scdr nat-stream-2))) '(1 . 3))
(check-equal? (scar (scdr (scdr (scdr nat-stream-2)))) '(2 . 2))
(check-equal? (scar (scdr (scdr (scdr (scdr nat-stream-2))))) '(1 . 4))
(check-equal? (scar (scdr (scdr (scdr (scdr (scdr nat-stream-2)))))) '(1 . 5))
