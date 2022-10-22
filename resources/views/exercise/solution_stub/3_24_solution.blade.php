(define (make-table same-key?)
   (let ((local-table (mcons '*table* '())))
         (define (assoc key records)
           (cond ((null? records) #f)
                 ((same-key? key (caar records)) (car records))
                 (else (assoc key (cdr records)))))
         (define (lookup key-1 key-2)
           (let ((subtable (assoc key-1 (mcdr local-table))))
                 (if subtable
                   (let ((record (assoc key-2 (cdr subtable))))
                         (if record
                           (cdr record)
                           #f))
                   #f)))
         (define (insert! key-1 key-2 value)
           (let ((subtable (assoc key-1 (mcdr local-table))))
                 (if subtable
                   (let ((record (assoc key-2 (cdr subtable))))
                         (if record
                           (set-cdr! record value)
                           (set-cdr! subtable
                                    (cons (cons key-2 value)
                                          (cdr subtable)))))
                   (set-cdr! local-table
                             (cons (list key-1
                                         (cons key-2 value))
                                   (mcdr local-table))))))
         (define (dispatch m)
           (cond ((eq? m 'lookup-proc) lookup)
                 ((eq? m 'insert-proc!) insert!)
                 (else (error "Unkown operation -- TABLE" m))))
         dispatch))
