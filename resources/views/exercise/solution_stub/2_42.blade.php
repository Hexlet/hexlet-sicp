#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (accumulate op initial sequence)
  (if (null? sequence)
      initial
      (op (car sequence)
          (accumulate op initial (cdr sequence)))))

(define (flatmap proc seq)
  (accumulate append '() (map proc seq)))

(define (enumerate-interval low high)
  (if (> low high)
      '()
      (cons low (enumerate-interval (+ low 1) high))))

(define (queens board-size)
  (define (queen-cols k)  
    (if (= k 0)
        (list empty-board)
        (filter
         (lambda (positions) (safe? k positions))
         (flatmap
          (lambda (rest-of-queens)
            (map (lambda (new-row)
                   (adjoin-position new-row k rest-of-queens))
                 (enumerate-interval 1 board-size)))
          (queen-cols (- k 1))))))
  (queen-cols board-size))

(define queens4 (queens 4))


(check-equal? (queens 1) '((1)))
(check-equal? (queens 2) '())
(check-equal? (queens 3) '())
(check-true (or (equal? queens4 '((3 1 4 2) (2 4 1 3)))
                (equal? queens4 '((2 4 1 3) (3 1 4 2)))))
