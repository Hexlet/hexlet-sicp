#lang sicp
(#%require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

(define (make-serializer)
  (let ((mutex (make-mutex)))
    (lambda (p)
      (define (serialized-p . args)
        (mutex 'acquire)
        (let ((val (apply p args)))
          (mutex 'release)
          val))
      serialized-p)))

(define (make-mutex)
  (let ((cell (list false)))            
    (define (the-mutex m)
      (cond ((eq? m 'acquire)
             (if (test-and-set! cell)
                 (the-mutex 'acquire))) ; retry
            ((eq? m 'release) (clear! cell))))
    the-mutex))
(define (clear! cell)
  (set-car! cell false))

(define (test-and-set! cell)
  (if (car cell)
      true
      (begin (set-car! cell true)
             false)))

(define (exchange account1 account2)
  (let ((difference (- (account1 'balance)
                       (account2 'balance))))
    ((account1 'withdraw) difference)
    ((account2 'deposit) difference)))



(define peter-acc (make-account 100 1))

(check-equal? (peter-acc 'number) 1)
(check-equal? (peter-acc 'balance) 100)
(check-equal? ((peter-acc 'withdraw) 20) 80)
(check-equal? ((peter-acc 'deposit) 70) 150)

(define paul-acc (make-account 50 2))

(serialized-exchange peter-acc paul-acc)
(check-equal? (peter-acc 'balance) 50)
(check-equal? (paul-acc 'balance) 150)
