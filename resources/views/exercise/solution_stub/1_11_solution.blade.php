(define (f x)
  (if (< x 3)
      x
      (+ (f (- x 1)) (* 2 (f (- x 2))) (* 3 (f (- x 3))))))

(define (f-iter x)
  (define (iter-step a b c count)
    (if (= count 0)
        c
        (iter-step (+ a (* 2 b) (* 3 c)) a b (- count 1))))
  (if (< x 3)
      x
      (iter-step 2 1 0 x)))
