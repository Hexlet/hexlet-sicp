(define (table-body table)
   (cdr table))

 (define (append-table! table key value)
   (let ((newpair (cons key value)))
        (set-cdr! table (cons newpair (table-body table)))))

 (define special-key 'xxx)

 (define (insert! table keys value)
    (if (null? keys)
      (let ((record (assoc special-key (table-body table))))
             (if (eq? record #f)
                 (append-table! table special-key value)
                 (set-cdr! record value)))
      (let ((record (assoc (car keys) (table-body table))))
           (cond ((eq? record #f)
                  (append-table! table (car keys) (make-table))
                  (insert! (cdadr table) (cdr keys) value))
                 (else (insert! (cdr record) (cdr keys) value))))))

 (define (lookup table keys)
         (if (null? keys)
             (let ((record (assoc special-key (table-body table))))
                  (if (eq? record #f)
                      #f
                      (cdr record)))
             (let ((record (assoc (car keys) (table-body table))))
                  (if (eq? record #f)
                      #f
                      (lookup (cdr record) (cdr keys))))))

(define (make-table . table-name)
    (if (null? table-name)
        (mlist '*table*)
        table-name))
