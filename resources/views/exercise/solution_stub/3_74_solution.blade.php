(define (sign-change-detector old new) 
       (cond ((or (positive? old) (zero? old)) 
              (if (negative? new) -1 0)) 
             ((negative? old) 
              (if (negative? new) 0 1))))

(define zero-crossings 
         (stream-map sign-change-detector sense-data (cons-stream 0 sense-data)))
