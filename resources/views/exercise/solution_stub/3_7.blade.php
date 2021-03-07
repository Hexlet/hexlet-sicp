#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (make-account balance secret)
  (define (withdraw amount)
    (if (>= balance amount)
        (begin (set! balance (- balance amount))
               balance)
        "Insufficient funds"))
  (define (deposit amount)
    (set! balance (+ balance amount))
    balance)
  (define (dispatch key m)
    (cond ((eq? key secret)
           (cond ((eq? m 'withdraw) withdraw)
                 ((eq? m 'deposit) deposit)
                 (else (error "Unknown request -- MAKE-ACCOUNT"
                       m))))
          (else (error "Wrong password"))))
  dispatch)

(define peter-acc (make-account 100 'secret-password))

(define paul-acc
    (make-joint peter-acc 'secret-password 'rosebud))

(check-equal? ((peter-acc 'secret-password 'deposit) 10) 110)
(check-equal? ((paul-acc 'rosebud 'deposit) 10) 120)
(check-equal? ((peter-acc 'secret-password 'withdraw) 20) 100)
(check-equal? ((paul-acc 'rosebud 'withdraw) 85) 15)
