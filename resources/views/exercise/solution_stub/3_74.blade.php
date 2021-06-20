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


(define (make-zero-crossings input-stream last-value)
  (cons-stream
    (sign-change-detector (stream-car input-stream) last-value)
    (make-zero-crossings (stream-cdr input-stream) (stream-car input-stream))))

(define sense-data (cons-stream 1
   (cons-stream 2 (cons-stream 1.5  (cons-stream 1  (cons-stream 0.5
   (cons-stream -0.1  (cons-stream -2  (cons-stream -3  (cons-stream -2
   (cons-stream -0.5  (cons-stream 0.2  (cons-stream 3 4)))))))))))))


(define scar stream-car)
(define scdr stream-cdr)

(check-equal? (scar zero-crossings) 0)
(check-equal? (scar (scdr zero-crossings)) 0)
(check-equal? (scar (scdr (scdr zero-crossings))) 0)
(check-equal? (scar (scdr (scdr (scdr zero-crossings)))) 0)
(check-equal? (scar (scdr (scdr (scdr (scdr zero-crossings))))) -1)
(check-equal? (scar (scdr (scdr (scdr (scdr (scdr zero-crossings)))))) 0)
(check-equal? (scar (scdr (scdr (scdr (scdr
              (scdr (scdr (scdr (scdr (scdr zero-crossings)))))))))) 1)
