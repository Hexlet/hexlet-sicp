(define (cont-frac n d k)
  (define (iter index)
    (if (> index k)
      0
      (/ (n index) (+ (d index) (iter (+ index 1))))))
  (iter 1))
