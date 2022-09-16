#lang racket/base
(require rackunit)
(require sicp)


;;; BEGIN
{!! $solution !!}
;;; END

;(define sense-data (cons-stream 1
;   (cons-stream 2 (cons-stream 1.5  (cons-stream 1  (cons-stream 0.5
;   (cons-stream -0.1  (cons-stream -2  (cons-stream -3  (cons-stream -2
;   (cons-stream -0.5  (cons-stream 0.2  (cons-stream 3 4)))))))))))))


(check-equal? (stream-ref zero-crossings 0) 0)
(check-equal? (stream-ref zero-crossings 1) 0)
(check-equal? (stream-ref zero-crossings 2) 0)
(check-equal? (stream-ref zero-crossings 3) 0)
(check-equal? (stream-ref zero-crossings 4) -1)
(check-equal? (stream-ref zero-crossings 5) 0)
(check-equal? (stream-ref zero-crossings 9) 1)
