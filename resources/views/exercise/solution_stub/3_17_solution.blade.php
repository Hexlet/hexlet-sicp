(define (count-pairs x)
   (let ((encountered '()))
     (define (helper x)
       (if (or (not (pair? x)) (memq x encountered))
         0
         (begin
           (set! encountered (cons x encountered))
           (+ (helper (car x))
              (helper (cdr x))
              1))))
   (helper x)))
