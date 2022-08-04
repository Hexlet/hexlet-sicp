(define (square x) (* x x))

(define (expmod base exp m)
  (cond 
    ((= exp 0) 1)
    ((even? exp)
      (remainder (square (expmod base (/ exp 2) m)) 
                 m))
    (else
      (remainder (* base (expmod base (- exp 1) m))
                 m))))

(define (fermat-test a n)
  (= (expmod a n n) a))

(define (carmichael-test n)
  (define (carmichael-test-iter acc)
    (cond 
      ((= acc n) #t)
      ((fermat-test acc n) (carmichael-test-iter (+ acc 1)))
      (else #f)))
  (carmichael-test-iter 1))
