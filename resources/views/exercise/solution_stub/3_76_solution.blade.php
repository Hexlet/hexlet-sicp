(define (average x y)
  (/ (+ x y) 2))

(define (smooth input-stream)
  (stream-map average input-stream (stream-cdr input-stream)))
