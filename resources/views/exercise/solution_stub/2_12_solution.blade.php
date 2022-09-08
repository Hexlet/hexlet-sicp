(define (make-center-percent c p)
   (let ((width (abs (* (/ p 100) c))))
   (make-interval (- c width) (+ c width))))

(define (percent i)
   (if (= (center i) 0)
     0
     (* 100 (abs (/ (- (upper-bound i) (center i)) (center i))))))
