(define (gcd a b)
  (if (= b 0)
      a
      (gcd b (remainder a b))))

(define (normalize n d)
  (let ((g (abs(gcd n d))))
    (cons (/ n g) (/ d g))))

(define (make-rat n d)
  (cond ((< d 0) (normalize (- n) (- d)))
        ((normalize n d))))
