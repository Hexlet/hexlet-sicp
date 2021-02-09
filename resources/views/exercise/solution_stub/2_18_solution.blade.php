(define (reverse x)
  (reverse-iter x '()))

(define (reverse-iter x y)
  (if (null? x)
      y
      (reverse-iter (cdr x) (cons (car x) y))))
