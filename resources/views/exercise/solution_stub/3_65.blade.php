#lang sicp
(#%require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

(define (square x) (* x x))

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

(define (stream-ref s n)
  (if (= n 0)
      (stream-car s)
      (stream-ref (stream-cdr s) (- n 1))))

(define (euler-transform s)
  (let ((s0 (stream-ref s 0))
        (s1 (stream-ref s 1))
        (s2 (stream-ref s 2)))
    (cons-stream (- s2 (/ (square (- s2 s1))
                          (+ s0 (* -2 s1) s2)))
                 (euler-transform (stream-cdr s)))))

(define (make-tableau transform s)
  (cons-stream s
               (make-tableau transform
                             (transform s))))

(define (accelerated-sequence transform s)
  (stream-map stream-car
              (make-tableau transform s)))


(define test-sequence (ln2-sequence 1))
(check-equal? (stream-ref test-sequence 0) 1.0)
(check-equal? (stream-ref test-sequence 1) -0.5)
(check-equal? (floor (* 100 (stream-ref test-sequence 2))) 33.0)

(define euler-test-sequence (euler-transform test-sequence))
(check-equal? (floor (* 1000 (stream-ref euler-test-sequence 0))) 35.0)
(check-equal? (round (* 10000 (stream-ref euler-test-sequence 1))) -98.0)

(define accelerated-test-sequence
  (accelerated-sequence euler-transform test-sequence))
(check-equal? (stream-ref accelerated-test-sequence 0) 1.0)
(check-equal?
 (floor (* 1000 (stream-ref accelerated-test-sequence 1))) 35.0)
