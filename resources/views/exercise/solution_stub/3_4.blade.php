#lang racket/base
(require rackunit)
(require racket/exn)

;;; BEGIN
{!! $solution !!}
;;; END

(define acc (make-account 100 'secret-password))

(define wrong-message "Wrong password\n")

(define cops-message "Cops called\n")

(define (attempt)
  (with-handlers ([exn:fail?
                    (lambda (e) (exn->string e))])
     ((acc 'some-other-password 'deposit) 50)))

(check-equal? ((acc 'secret-password 'withdraw) 40) 60)
(check-equal? ((acc 'secret-password 'deposit) 40) 100)
(check-equal? (attempt) wrong-message)
(check-equal? (attempt) wrong-message)
(check-equal? (attempt) wrong-message)
(check-equal? (attempt) wrong-message)
(check-equal? (attempt) wrong-message)
(check-equal? (attempt) wrong-message)
(check-equal? (attempt) wrong-message)
(check-equal? (attempt) cops-message)
