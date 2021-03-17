(define (square x)
  (* x x))

(define (square-list items)
  (if (null? items)
      '()
      (cons (square (car items)) (square-list (cdr items)))))

(define (square-list2 items)
  (map square items))
