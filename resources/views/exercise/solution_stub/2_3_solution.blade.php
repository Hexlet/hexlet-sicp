(define (make-rectangle start-point width height)
  (cons start-point (cons width height)))

(define (get-width rect)
  (cadr rect))

(define (get-height rect)
  (cddr rect))

(define (rectangle-square rect)
  (* (get-width rect) (get-height rect)))

(define (rectangle-perimeter rect)
  (+ (* 2 (get-width rect)) (* 2 (get-height rect))))
