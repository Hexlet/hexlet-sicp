(define (last-pair lst)
  (if (null? lst)
      nil
      (if (null? (cdr lst))
          (car lst)
          (last-pair (cdr lst)))))
