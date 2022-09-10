(define (partial-sums s)
   (add-streams s (cons-stream 0 (partial-sums s))))
