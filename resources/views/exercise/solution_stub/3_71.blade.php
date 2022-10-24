#lang racket/base
(require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

(require racket)

(check-equal? (stream-first ramanujan-numbers) 1729)
(check-equal? (stream-first (stream-rest ramanujan-numbers)) 4104)
