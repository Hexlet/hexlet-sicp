(define (plus-one x) (+ 1 x))

(define (accumulate op initial sequence)
  (if (null? sequence)
      initial
      (op (car sequence)
          (accumulate op initial (cdr sequence)))))

(define (map p sequence)
  (accumulate (lambda (x y) (cons (p x) y)) '() sequence))

(define (append seq1 seq2)
  (accumulate (lambda (x y) (cons x y)) seq2 seq1))

(define (length sequence)
  (accumulate (lambda (x y) (plus-one y)) 0 sequence))
