(define (even? x)
  (= (remainder x 2) 0))

(define (reverse x)
  (reverse-iter x '()))

(define (reverse-iter x y)
  (if (null? x)
      y
      (reverse-iter (cdr x) (cons (car x) y))))

(define (same-parity h . opt)
  (define (check-parity x)
    (equal? (even? h) (even? x)))
  (define (get-elems el acc)
    (if (null? el)
        (reverse acc)
        (if (check-parity (car el))
            (get-elems (cdr el) (cons (car el) acc))
            (get-elems (cdr el) acc))))
  (if (null? opt)
      (list h)
      (cons h (get-elems opt '()))))
