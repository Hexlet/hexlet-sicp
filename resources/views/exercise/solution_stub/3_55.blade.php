#lang sicp
(#%require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

(define (stream-car stream) (car stream))

(define (stream-cdr stream) (force (cdr stream)))

(define ones (cons-stream 1 ones))

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


(define integers (cons-stream 1 (add-streams ones integers)))


(check-equal? (stream-car (partial-sums integers)) 1)
(check-equal? (stream-car (stream-cdr (partial-sums integers))) 3)
(check-equal? (stream-car (stream-cdr (stream-cdr (partial-sums integers)))) 6)
(check-equal? (stream-car (stream-cdr (stream-cdr (stream-cdr (partial-sums integers))))) 10)

(check-equal? (stream-car (partial-sums ones)) 1)
(check-equal? (stream-car (stream-cdr (partial-sums ones))) 2)
(check-equal? (stream-car (stream-cdr (stream-cdr (partial-sums ones)))) 3)
