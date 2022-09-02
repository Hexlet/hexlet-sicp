(define random-init
  (inexact->exact (current-milliseconds)))

(define random-update
  (let ((m 19)
        (a 3)
        (c 5))
    (lambda (x)
      (modulo (+ (* a x) c) m))))

(define rand
   (let ((x random-init))
     (define (dispatch message)
       (cond ((eq? message 'generate)
               (begin (set! x (random-update x))
                      x))
             ((eq? message 'reset)
               (lambda (new-value) (set! x new-value)))))
     dispatch))
