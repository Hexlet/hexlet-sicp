 (define (inc x) (+ x 1))

 (define (cons a b) 
   (* (expt 2 a ) 
      (expt 3 b))) 
  
 (define (car z) 
   (if (= (remainder z 2) 0) 
       (inc (car (/ z 2))) 
       0)) 
  
 (define (cdr z) 
   (if (= (remainder z 3) 0) 
       (inc (cdr (/ z 3))) 
       0))
