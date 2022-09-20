#lang racket/base
(require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

(require compatibility/mlist)

(define (clear! cell)
  (set-mcar! cell #f))

(define (test-and-set! cell)
  (if (mcar cell)
      #t
      (begin (set-mcar! cell #t)
             #f)))

(define (make-mutex)
  (let ((cell (mlist #f)))
  (define (the-mutex m)
    (cond ((eq? m 'acquire)
           (when (test-and-set! cell)
               (the-mutex 'acquire)))
          ((eq? m 'release) (clear! cell))))
  the-mutex))

(define semaphore (make-semaphore 2))
; 'count also included to get semaphore state
(check-equal? (semaphore 'count) 2)
(semaphore 'acquire)
(check-equal? (semaphore 'count) 1)
(semaphore 'release)
(check-equal? (semaphore 'count) 2)
(semaphore 'acquire)
(semaphore 'acquire)
(check-equal? (semaphore 'count) 0)
