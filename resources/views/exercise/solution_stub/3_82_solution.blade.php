(define (random-in-range low high)
   (let ((range (- high low)))
     (+ low (random range))))

(define (randoms-ranged low high)
   (cons-stream (random-in-range low high)
                (randoms-ranged low high)))

(define (estimate-integral P x1 x2 y1 y2)
   (define point-in-integral-stream
     (stream-map P (randoms-ranged x1 x2) (randoms-ranged y1 y2)))
   (monte-carlo point-in-integral-stream 0 0))
