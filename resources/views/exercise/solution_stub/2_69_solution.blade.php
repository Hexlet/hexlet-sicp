(define (successive-merge leaves)
   (if (null? (cdr leaves))
       (car leaves)
       (successive-merge
        (adjoin-set (make-code-tree (car leaves) (cadr leaves))
                    (cddr leaves)))))
