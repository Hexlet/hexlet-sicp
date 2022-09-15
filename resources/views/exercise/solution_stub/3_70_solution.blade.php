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
