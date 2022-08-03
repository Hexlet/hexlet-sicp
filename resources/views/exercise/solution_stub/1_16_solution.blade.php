(define (square x) (* x x))

(define (solution b n) 
   (define (iter N B A) 
     (cond ((= 0 N) A) 
           ((even? N) (iter (/ N 2) (square B) A)) 
           (else (iter (- N 1) B (* B A))))) 
   (iter n b 1))
