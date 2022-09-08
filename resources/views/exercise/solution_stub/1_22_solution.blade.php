(define (search-for-primes lower upper op)
   (define (iter n)
     (cond ((<= n upper) (timed-prime-test n op) (iter (+ n 2)))))
   (iter (if (odd? lower) lower (+ lower 1))))
