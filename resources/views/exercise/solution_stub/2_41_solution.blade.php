(define nil '())

(define (accumulate op initial sequence)
   (if (null? sequence)
       initial
       (op (car sequence)
           (accumulate op initial (cdr sequence)))))

(define (enumerate-interval low high)
   (if (> low high)
       nil
       (cons low (enumerate-interval (+ low 1) high))))

(define (flatmap proc seq)
   (accumulate append nil (map proc seq)))

(define (unique-triples n)
   (flatmap (lambda (i)
              (flatmap (lambda (j)
                     (map (lambda (k)
                            (list i j k))
                          (enumerate-interval 1 (- j 1))))
                   (enumerate-interval 1 (- i 1))))
            (enumerate-interval 1 n)))

(define (sum-to? numbers s)
   (= (apply + numbers) s))

(define (make-triple-sum n s)
   (filter (lambda (triple) (sum-to? triple s)) (unique-triples n)))
