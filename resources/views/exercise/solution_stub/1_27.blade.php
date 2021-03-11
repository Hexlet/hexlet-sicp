#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(check-equal? (carmichael-test 4) #f)
(check-equal? (carmichael-test 3) #t)
(check-equal? (carmichael-test 561) #t)
(check-equal? (carmichael-test 1105) #t)
(check-equal? (carmichael-test 1729) #t)
(check-equal? (carmichael-test 2465) #t)
(check-equal? (carmichael-test 2821) #t)
(check-equal? (carmichael-test 6601) #t)
