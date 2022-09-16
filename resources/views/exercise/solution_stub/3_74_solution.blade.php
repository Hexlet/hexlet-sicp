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

(define (sign-change-detector old new) 
       (cond ((or (positive? old) (zero? old)) 
              (if (negative? new) -1 0)) 
             ((negative? old) 
              (if (negative? new) 0 1))))


(define sense-data (cons-stream 1
   (cons-stream 2 (cons-stream 1.5  (cons-stream 1  (cons-stream 0.5
   (cons-stream -0.1  (cons-stream -2  (cons-stream -3  (cons-stream -2
   (cons-stream -0.5  (cons-stream 0.2  (cons-stream 3 4)))))))))))))

(define zero-crossings 
   (stream-map sign-change-detector 
               sense-data 
               (stream-cdr sense-data)))
