(define (cont-frac n d k)
  (define (iter index)
    (if (> index k)
      0
      (/ (n index) (+ (d index) (iter (+ index 1))))))
  (iter 1))

(define (e k)
    (define (N i) 1)
    (define (D i)
        (if (= 0 (remainder (+ i 1) 3))
            (* 2 (/ (+ i 1) 3))
            1))
    (+ 2.0 
       (cont-frac N D k)))
