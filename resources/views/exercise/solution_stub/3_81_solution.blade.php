(define random-update
  (let ((m 19)
        (a 3)
        (c 5))
    (lambda (x)
      (modulo (+ (* a x) c) m))))

(define random-init (random-update (expt 2 32)))

(define (random-numbers s-in)
  (define (action x m)
    (cond ((eq? m 'generate)
           (random-update x))
          (else m)))
  (cons-stream 
    random-init
    (stream-map action (random-numbers s-in) s-in)))
