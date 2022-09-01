(define (raise n) (apply-generic 'raise n))

(define (raise-scheme-number n)
  (make-rational n 1))

(define (numer x) (car x))
(define (denom x) (cdr x))

(define (content datum)
  (cond ((pair? datum) (cdr datum))
        ((number? datum) datum)
        (else "bad tagged data")))

(define (raise-rational n)
  (attach-tag 'real (/ (numer (content n)) (denom (content n)))))

(define (raise-real n)
  (make-complex-from-mag-ang (content n) 0))

(define (raise-rational-to-complex n)
  (make-complex-from-real-imag (/ (numer n) (denom n)) 0))

(define (update-scheme-number-package)
  (put 'raise '(scheme-number) raise-scheme-number))

(define (update-rational-package)
  (put 'raise '(rational) raise-rational-to-complex))

