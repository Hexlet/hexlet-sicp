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

(define (merge s1 s2)
  (cond ((stream-null? s1) s2)
        ((stream-null? s2) s1)
        (else
         (let ((s1car (stream-car s1))
               (s2car (stream-car s2)))
           (cond ((< s1car s2car)
                  (cons-stream s1car (merge (stream-cdr s1) s2)))
                 ((> s1car s2car)
                  (cons-stream s2car (merge s1 (stream-cdr s2))))
                 (else
                  (cons-stream s1car
                               (merge (stream-cdr s1)
                                      (stream-cdr s2)))))))))


(define scar stream-car)
(define scdr stream-cdr)


(check-equal? (scar s) 1)
(check-equal? (scar (scdr s)) 2)
(check-equal? (scar (scdr (scdr s))) 3)
(check-equal? (scar (scdr (scdr (scdr s)))) 4)
(check-equal? (scar (scdr (scdr (scdr (scdr s))))) 5)
(check-equal? (scar (scdr (scdr (scdr (scdr (scdr s)))))) 6)
(check-equal? (scar (scdr (scdr (scdr (scdr (scdr (scdr s))))))) 8)
(check-equal? (scar (scdr (scdr (scdr (scdr (scdr (scdr (scdr s)))))))) 9)
(check-equal? (scar (scdr (scdr (scdr (scdr (scdr (scdr (scdr (scdr s))))))))) 10)
(check-equal? (scar (scdr (scdr (scdr (scdr (scdr (scdr (scdr (scdr (scdr s)))))))))) 12)
