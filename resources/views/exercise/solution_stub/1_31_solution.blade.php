(define (next x) (+ x 1))

(define (product term a next b)
    (if (> a b) 1 
        (* (term a) (product term (next a) next b))))

(define (factorial n) 
        (product identity 1 next n))
