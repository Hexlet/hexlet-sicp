#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(require racket/exn)

(define (make-interval a b)
  (cons a b))

(define (lower-bound interval)
  (car interval))

(define (upper-bound interval)
  (cdr interval))

(define (mul-interval x y)
  (let ((p1 (* (lower-bound x) (lower-bound y)))
        (p2 (* (lower-bound x) (upper-bound y)))
        (p3 (* (upper-bound x) (lower-bound y)))
        (p4 (* (upper-bound x) (upper-bound y))))
    (make-interval (min p1 p2 p3 p4)
                   (max p1 p2 p3 p4))))


(define x (make-interval 5.0 15.0))
(define y (make-interval -5.0 0.0))
(define z (make-interval 0.0 5.0))

(define (attempt a b)
  (with-handlers ([exn:fail?
                    (lambda (e) (exn->string e))])
     (div-interval a b)))

(define error-message "division by zero")
; substring used because checking system has extra output
(check-equal? (substring (attempt x y) 0 16) error-message)
(check-equal? (substring (attempt x y) 0 16) error-message)
(check-equal? (attempt x (make-interval 1 1)) x)
