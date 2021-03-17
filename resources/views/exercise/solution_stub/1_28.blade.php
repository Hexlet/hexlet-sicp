#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (miller-rabin-test 3) #t)
(check-equal? (miller-rabin-test 4) #f)
(check-equal? (miller-rabin-test 561) #f)
(check-equal? (miller-rabin-test 1105) #f)
(check-equal? (miller-rabin-test 1729) #f)
(check-equal? (miller-rabin-test 2465) #f)
(check-equal? (miller-rabin-test 2821) #f)
(check-equal? (miller-rabin-test 6601) #f)
(check-equal? (miller-rabin-test 19999) #f)
(check-equal? (miller-rabin-test 1999) #t)
