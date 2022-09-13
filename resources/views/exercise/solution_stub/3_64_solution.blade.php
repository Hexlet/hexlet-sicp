(define (stream-limit stream tolerance)
        (if (< (abs (- (stream-ref stream 1) (stream-ref stream 0))) tolerance)
                (stream-ref stream 1)
                (stream-limit (stream-cdr stream) tolerance)))

(define (stream-ref s n)
  (if (= n 0)
    (stream-car s)
    (stream-ref (stream-cdr s) (- n 1))))
