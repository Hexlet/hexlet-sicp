(define (double n)
    (+ n n))

(define (halve n)
    (/ n 2))

(define (mul-iter a b)
  (define (iter a b product)
    (cond ((= b 0)
            product)
          ((even? b)
            (iter (double a)
                        (halve b)
                        product))
          ((odd? b)
            (iter a
                        (- b 1)
                        (+ a product)))))
    (iter a b 0))
