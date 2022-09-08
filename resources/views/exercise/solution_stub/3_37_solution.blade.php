 (define (c- x y)
   (let ((z (make-connector)))
     (adder z y x)
     z))

 (define (c* x y)
   (let ((z (make-connector)))
     (multiplier x y z)
     z))

 (define (c/ x y)
   (let ((z (make-connector)))
     (multiplier z y x)
     z))

 (define (cv x)
   (let ((z (make-connector)))
     (constant x z)
     z))
