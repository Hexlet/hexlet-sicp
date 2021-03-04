(define (make-monitored f)
  (let ((acc 0))
    (lambda (arg)
      (cond ((eq? arg 'how-many-calls?) acc)
            ((eq? arg 'reset-count)
             (begin (set! acc 0) acc))
            (else
             (begin (set! acc (+ acc 1))
                    (f arg)))))))
