(define (=zero? x) (apply-generic '=zero? x))

(define (update-scheme-number-package)
  (put '=zero? '(scheme-number) (lambda (x) (= 0 x))))

(define (update-rational-package)
  (put '=zero? '(rational)
       (lambda (x) (= 0 (car x)))))

(define (update-complex-package)
  (put '=zero? '(complex)
       (lambda (c1) (and (= 0 (real-part c1)) (= 0 (imag-part c1))))))
