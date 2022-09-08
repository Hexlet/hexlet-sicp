 (define (square x) (* x x)) 
  
 (define (miller-rabin-expmod base exp m) 
   (define (squaremod-with-check x) 
     (define (check-nontrivial-sqrt1 x square) 
       (if (and (= square 1) 
                (not (= x 1)) 
                (not (= x (- m 1)))) 
           0 
           square)) 
     (check-nontrivial-sqrt1 x (remainder (square x) m))) 
   (cond ((= exp 0) 1) 
         ((even? exp) (squaremod-with-check 
                       (miller-rabin-expmod base (/ exp 2) m))) 
         (else 
          (remainder (* base (miller-rabin-expmod base (- exp 1) m)) 
                     m)))) 
  
 (define (miller-rabin-test n) 
   (define (try-it a) 
     (define (check-it x) 
       (and (not (= x 0)) (= x 1))) 
     (check-it (miller-rabin-expmod a (- n 1) n))) 
   (try-it (+ 1 (random (- n 1))))) 
