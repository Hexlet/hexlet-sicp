#lang racket/base
(require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

(define (cons x pair) (mcons x pair))

(define (car x) (mcar x))

(define (cdr x) (mcdr x))

(define (set-car! head pair) (set-mcar! head pair))

(define (set-cdr! tail pair) (set-mcdr! tail pair))


(define dq (make-deque))

(check-true (empty-deque? dq))

(front-insert-deque! dq 'a)
(check-false (empty-deque? dq))
(check-equal? (front-deque dq) 'a)
(check-equal? (rear-deque dq) 'a)

(rear-insert-deque! dq 'b)
(check-equal? (rear-deque dq) 'b)

(front-delete-deque! dq)
(check-equal? (front-deque dq) 'b)

(front-insert-deque! dq 'a)
(check-equal? (front-deque dq) 'a)

(rear-delete-deque! dq)
(check-equal? (rear-deque dq) 'a)
