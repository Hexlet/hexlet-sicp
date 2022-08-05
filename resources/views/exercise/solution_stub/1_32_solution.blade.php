  (define (accumulate combiner null-value term a next b)
    (define (iter a res)
      (if (> a b) res
          (iter (next a) (combiner res (term a)))))
    (iter a null-value))
