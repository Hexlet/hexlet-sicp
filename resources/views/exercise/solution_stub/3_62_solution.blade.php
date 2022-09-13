(define (div-series nums dems)
   (mul-series nums 
               (invert-unit-series dems)))

(define (mul-series s1 s2)
  (cons-stream
    (* (stream-car s1) (stream-car s2))
    (add-streams (add-streams (scale-stream (stream-cdr s1) (stream-car s2))
                              (scale-stream (stream-cdr s2) (stream-car s1)))
                 (cons-stream 0 (mul-series (stream-cdr s1) (stream-cdr s2))))))

(define (invert-unit-series stream)
  (cons-stream 1
               (negate-series (mul-series (stream-cdr stream)
                                          (invert-unit-series stream)))))

(define (negate-series series)
  (stream-map (lambda (x) (- x))
              series))

(define (integrate-series s)
              (stream-map /  s integers))

(define sine-series
  (cons-stream 0 (integrate-series cosine-series)))

(define cosine-series
  (cons-stream 1 (integrate-series (scale-stream sine-series -1))))
