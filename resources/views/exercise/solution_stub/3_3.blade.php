#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(require racket/exn)

(define incorrect-message "Incorrect password")

(define insufficient-message "Insufficient funds")

(define acc (make-account 100 'secret-password))

(define (wrong-password-attempt)
  (with-handlers ([exn:fail?
                    (lambda (e) (exn->string e))])
     ((acc 'some-other-password 'deposit) 50)))

(define (insufficient-funds-attempt)
  (with-handlers ([exn:fail?
                    (lambda (e) (exn->string e))])
     ((acc 'secret-password 'withdraw) 5000)))

(check-equal? ((acc 'secret-password 'withdraw) 40) 60)
(check-equal? ((acc 'secret-password 'deposit) 40) 100)
; substring used because checking system has extra output
(check-equal? (substring (wrong-password-attempt) 0 18) incorrect-message)
(check-equal? (insufficient-funds-attempt) insufficient-message)
