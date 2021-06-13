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

(define (scale-stream stream factor)
  (stream-map (lambda (x) (* x factor)) stream))

(define (add-streams s1 s2)
  (stream-map + s1 s2))

(define (mul-streams s1 s2)
    (stream-map * s1 s2))

(define (div-streams s1 s2)
    (stream-map / s1 s2))

(define ones (cons-stream 1 ones))

(define integers (cons-stream 1 (add-streams ones integers)))



(define tan-series (div-series sine-series cosine-series))

(check-equal? (stream-car tan-series) 0)
(check-equal? (stream-car (stream-cdr tan-series)) 1)
(check-equal? (stream-car (stream-cdr (stream-cdr tan-series))) 0)
(check-equal? (stream-car (stream-cdr (stream-cdr (stream-cdr tan-series)))) 1/3)
