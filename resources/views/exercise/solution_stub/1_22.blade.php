#lang racket/base

(require rackunit)
(require sicp)

;;; BEGIN
{!! $solution !!}
;;; END

;#lang racket/base
;(require rackunit)
;(require sicp)

(define (square x) (* x x))

(define (smallest-divisor n)
  (find-divisor n 2))

(define (find-divisor n test-divisor)
  (cond ((> (square test-divisor) n) n)
        ((divides? test-divisor n) test-divisor)
        (else (find-divisor n (+ test-divisor 1)))))

(define (divides? a b)
  (= (remainder b a) 0))

(define (prime? n)
  (= (smallest-divisor n) n))

(define (timed-prime-test n out)
  (newline)
  (display n out)
  (start-prime-test n (runtime) out))

(define (start-prime-test n start-time out)
  (if (prime? n)
      (report-prime (- (runtime) start-time) out)))

(define (report-prime elapsed-time out)
  (display " *** " out)
  (displayln (floor elapsed-time) out))



(define op1 (open-output-string))
(search-for-primes 1 6 op1)
(define display-result (get-output-string op1))
(check-equal? display-result "1 *** 0\n3 *** 0\n5 *** 0\n")
(close-output-port op1)
