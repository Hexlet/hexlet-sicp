(define (accumulate ops initial sequence)
   (if (null? sequence)
       initial
       (ops (car sequence)
           (accumulate ops initial (cdr sequence)))))

 (define (accumulate-n op init seqs)
   (if (null? (car seqs))
       '() 
       (cons (accumulate op init (map car seqs))
             (accumulate-n op init (map cdr seqs)))))

 (define (dot-product v w)
   (accumulate + 0 (map * v w)))
  
 (define (matrix-*-vector m v)
   (map (lambda (w)
          (dot-product v w)) m))

 (define (transpose m)
   (accumulate-n cons '() m))

 (define (matrix-*-matrix m n)
   (let ((cols (transpose n)))
     (map (lambda (v) (matrix-*-vector cols v)) m)))
