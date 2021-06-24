#lang sicp
(#%require rackunit)


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


(define (mul-streams s1 s2)
    (stream-map * s1 s2))

(define (div-streams s1 s2)
    (stream-map / s1 s2))

(define (add-streams s1 s2)
  (stream-map + s1 s2))

(define ones (cons-stream 1 ones))

(define integers (cons-stream 1 (add-streams ones integers)))

(define (scale-stream stream factor)
  (stream-map (lambda (x) (* x factor)) stream))

(define double (cons-stream 1 (scale-stream double 2)))

(define s (integrate-series double))

(check-equal? (stream-ref s 0) 1)
(check-equal? (stream-ref s 1) 1)
(check-equal? (stream-ref s 3) 2)
(check-equal? (stream-ref s 7) 16)

(check-equal? (stream-ref sine-series 0) 0)
(check-equal? (stream-ref sine-series 1) 1)
(check-equal? (stream-ref sine-series 2) 0)
(check-equal? (stream-ref cosine-series 0) 1)
(check-equal? (stream-ref cosine-series 1) 0)
(check-equal? (stream-ref cosine-series 2) -1/2)
