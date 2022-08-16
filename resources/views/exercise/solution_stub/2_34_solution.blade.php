(define (accumulate op initial sequence)
    (if (null? sequence)
        initial
        (op (car sequence)
            (accumulate op initial (cdr sequence)))))

(define (horner-eval x coefficitent-sequences)
  (accumulate (lambda (this-coeff higher-terms) (+ this-coeff (* x higher-terms)))
              0
              coefficitent-sequences))
