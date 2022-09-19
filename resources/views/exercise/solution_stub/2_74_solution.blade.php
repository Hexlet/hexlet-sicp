(define (content datum)
  (map (lambda (x) (display x) (newline)) (list "content" datum))
  (if (pair? datum)
    (cdr datum)
    (error "bad tagged data -- CONTENTS" datum)))

(define (ins1? file)
  (eq? (car file) 'ins1-record))

(define (ins2? file)
  (eq? (car file) 'ins2-record))


(define (get-ins1-record records name)
  (cond ((null? records) '())
        ((equal? name (cdaar records)) 
         (attach-tag 'ins1-record (car records)))
        (else (get-ins1-record (cdr records) name))))

(define (get-ins2-record records name)
  (cond ((null? records) '())
        ((equal? name (caar records)) 
         (attach-tag 'ins2-record (car records)))
        (else (get-ins2-record (cdr records) name))))

(define (get-ins1-salary record)
  (cond ((null? record)
         (error "Invalid record, doesn't contain salary information"))
        ((eq? 'salary (caar record))
         (cdar record))
        (else (get-ins1-salary (cdr record)))))

(define (get-ins2-salary record)
  (car (cddadr record)))

(define (find-employee-record files name)
  (cond ((null? files) '())
        (else
          (let ((proc (get 'get-record (type-tag (car files)))))
            (let ((record (proc (content (car files)) name)))
              (if (not (null? record))
                (content record)
                (find-employee-record (cdr files) name)))))))

(define (get-salary record)
  (cond ((ins1? record)
         (get-ins1-salary (content record)))
        ((ins2? record)
         (get-ins2-salary (content record)))))

(define (get-record file name)
  (cond ((ins1? file)
         (get-ins1-record (content file) name))
        ((ins2? file)
         (get-ins2-record (content file) name))))

(define (get op type)
  (cond ((and (eq? op 'get-record) (eq? type 'ins1-record)) get-ins1-record)
        ((and (eq? op 'get-record) (eq? type 'ins2-record)) get-ins2-record)
        ((and (eq? op 'get-salary) (eq? type 'ins1-record)) get-ins1-salary)
        ((and (eq? op 'get-salary) (eq? type 'ins2-record)) get-ins2-salary)))
