(define (upper-bound interval) (max (car interval) (cdr interval)))

(define (lower-bound interval) (min (car interval) (cdr interval)))

(define (sub-interval a b)
  (make-interval (- (lower-bound a) (upper-bound b))
                 (- (upper-bound a) (lower-bound b))))
