#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (example-print example-list out)
  (my-for-each (lambda (x) (newline) (display x out)) example-list))

                      
(define op1 (open-output-string))
(example-print (list 1 2 3) op1)
(define display-result (get-output-string op1))
(check-equal? display-result "123")
(close-output-port op1)

(define op2 (open-output-string))
(example-print (list 57 321 88) op2)
(define display-result2 (get-output-string op2))
(check-equal? display-result2 "5732188")
(close-output-port op2)
