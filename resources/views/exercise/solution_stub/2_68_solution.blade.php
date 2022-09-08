(define (left-branch tree) (car tree))

(define (right-branch tree) (cadr tree))

(define (encode-symbol sym tree)
   (if (leaf? tree)
       (if (eq? sym (symbol-leaf tree))
           '()
           (error "missing symbol: ENCODE-SYMBOL" sym))
       (let ((left (left-branch tree)))
         (if (memq sym (symbols left))
             (cons 0 (encode-symbol sym left))
             (cons 1 (encode-symbol sym (right-branch tree)))))))
