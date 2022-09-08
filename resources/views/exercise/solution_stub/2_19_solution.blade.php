(define (first-denomination denominations) (car denominations))
 
(define (except-first-denomination denominations) (cdr denominations))
 
(define (no-more? denominations) (null? denominations))
