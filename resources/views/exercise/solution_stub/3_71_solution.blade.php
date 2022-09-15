(define (cube x)
  (* x x x))

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

(define (merge-weighted s t weight)
  (cond
    ((stream-null? s) t)
    ((stream-null? t) s)
    (else 
      (if (> (weight (car (stream-car s)) (cdr (stream-car s)))
             (weight (car (stream-car t)) (cdr (stream-car t))))
        (cons-stream (stream-car t) (merge-weighted s (stream-cdr t) weight))
        (cons-stream (stream-car s) (merge-weighted (stream-cdr s) t weight))))))


(define (weighted-pairs s t weight)
  (cons-stream 
    (cons (stream-car s) (stream-car t))
    (merge-weighted
      (stream-map (lambda (x) (cons (stream-car s) x))
                  (stream-cdr t))
      (weighted-pairs (stream-cdr s) (stream-cdr t) weight)
      weight)))

(define (weight i j)
  (+ (cube i) (cube j)))

(define p (weighted-pairs integers integers weight))

(define (pair-weigth p)
  (weight (car p) (cdr p)))

(define (generate-ramanujan-number pairs)
  (let ((first (stream-car pairs))
        (second (stream-car (stream-cdr pairs))))
    (if (= (pair-weigth first) (pair-weigth second))
      (cons-stream (pair-weigth first)
        (generate-ramanujan-number (stream-cdr pairs)))
      (generate-ramanujan-number (stream-cdr pairs)))))

(define ramanujan-numbers (generate-ramanujan-number p))
