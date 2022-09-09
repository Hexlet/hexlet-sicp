#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(require racket/exn)

(define acc (make-account 100 'secret-password))

(define wrong-message "Wrong password")

(define cops-message "Cops called")

(define (attempt)
  (with-handlers ([exn:fail?
                    (lambda (e) (exn->string e))])
     ((acc 'some-other-password 'deposit) 50)))

(check-equal? ((acc 'secret-password 'withdraw) 40) 60)
(check-equal? ((acc 'secret-password 'deposit) 40) 100)
; substring used because checking system has extra output
(check-equal? (substring (attempt) 0 14) wrong-message)
(check-equal? (substring (attempt) 0 14) wrong-message)
(check-equal? (substring (attempt) 0 14) wrong-message)
(check-equal? (substring (attempt) 0 14) wrong-message)
(check-equal? (substring (attempt) 0 14) wrong-message)
(check-equal? (substring (attempt) 0 14) wrong-message)
(check-equal? (substring (attempt) 0 14) wrong-message)
(check-equal? (substring (attempt) 0 11) cops-message)
