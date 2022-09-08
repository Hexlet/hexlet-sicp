(define (double n)
    (+ n n))

(define (halve n)
    (/ n 2))

(define (fast-mul a b)
    (cond ((= b 0)
            0)
          ((even? b)
            (double (fast-mul a (halve b))))
          ((odd? b)
            (+ a (fast-mul a (- b 1))))))
