(define (ln2-sequence n)
  (cons-stream (/ 1.0 n)
    (stream-map - (ln2-sequence (+ n 1)))))
