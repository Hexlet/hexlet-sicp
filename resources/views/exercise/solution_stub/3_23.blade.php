#lang racket/base
(require rackunit)
(require sicp)


;;; BEGIN
{!! $solution !!}
;;; END

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
