(define (equ? x y)
    (apply-generic 'equ? x y))

(define (update-scheme-number-package)
  (put 'equ? '(scheme-number scheme-number) equal?))

(define (update-rational-package)
  (put 'equ? '(rational rational)
       (lambda (x y) (and (equal? (car x) (car y))
                          (equal? (cdr x) (cdr y))))))

(define (update-complex-package)
  (put 'equ? '(complex complex)
       (lambda (c1 c2) (and (equal? (real-part c1) (real-part c2))
                            (equal? (imag-part c1) (imag-part c2))))))
