(define (reverse x)
  (reverse-iter x '()))

(define (reverse-iter x y)
  (if (null? x)
      y
      (reverse-iter (cdr x) (cons (car x) y))))

(define (deep-reverse x)
  (define (helper x)
    (if (null? x)
        '()
        (if (pair? (car x))
            (cons (helper (car x)) (helper (cdr x)))
            (reverse x))))
  (reverse (helper x)))
