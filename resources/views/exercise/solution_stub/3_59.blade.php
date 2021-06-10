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

(define scar stream-car)
(define scdr stream-cdr)

(define s (integrate-series double))

(check-equal? (scar s) 1)
(check-equal? (scar (scdr s)) 1)
(check-equal? (scar (scdr (scdr (scdr s)))) 2)
(check-equal? (scar (scdr (scdr (scdr (scdr (scdr (scdr (scdr s)))))))) 16)

(check-equal? (stream-car sine-series) 0)
(check-equal? (stream-car (stream-cdr sine-series)) 1)
(check-equal? (stream-car (stream-cdr (stream-cdr sine-series))) 0)
(check-equal? (stream-car cosine-series) 1)
(check-equal? (stream-car (stream-cdr cosine-series)) 0)
(check-equal? (stream-car (stream-cdr (stream-cdr cosine-series))) -1/2)
