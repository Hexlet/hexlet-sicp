(define (lower-bound interval)
  (car interval))

(define (upper-bound interval)
  (cdr interval))

(define (sub-interval a b)
  (make-interval (- (lower-bound a) (lower-bound b))
                 (- (upper-bound a) (upper-bound b))))
