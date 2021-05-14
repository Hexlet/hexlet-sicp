#lang racket/base
(require rackunit)


;;; BEGIN
{!! $solution !!}
;;; END

(define (front-ptr queue) (mcar queue))
(define (rear-ptr queue) (mcdr queue))

(define (set-front-ptr! queue item) (set-mcar! queue item))
(define (set-rear-ptr! queue item) (set-mcdr! queue item))

(define (empty-queue? queue) (null? (front-ptr queue)))

(define (make-queue) (mcons '() '()))

(define (insert-queue! queue item)
  (let ((new-pair (mcons item '())))
    (cond ((empty-queue? queue)
           (set-front-ptr! queue new-pair)
           (set-rear-ptr! queue new-pair)
           queue)
          (else
           (set-mcdr! (rear-ptr queue) new-pair)
           (set-rear-ptr! queue new-pair)
           queue))))

(define (delete-queue! queue)
  (cond ((empty-queue? queue)
         (error "DELETE! called with an empty queue" queue))
        (else
         (set-front-ptr! queue (mcdr (front-ptr queue)))
         queue))) 

(define q1 (make-queue))


(define op1 (open-output-string))
(print-queue q1 op1)
(define display-result (get-output-string op1))
(check-equal? display-result "()")
(close-output-port op1)


(define op2 (open-output-string))
(print-queue (insert-queue! q1 'a) op2)
(define display-result-2 (get-output-string op2))
(check-equal? display-result-2 "{a}")
(close-output-port op2)


(define op3 (open-output-string))
(print-queue (insert-queue! q1 'b) op3)
(define display-result-3 (get-output-string op3))
(check-equal? display-result-3 "{a b}")
(close-output-port op3)


(define op4 (open-output-string))
(print-queue (delete-queue! q1) op4)
(define display-result-4 (get-output-string op4))
(check-equal? display-result-4 "{b}")
(close-output-port op4)


(define op5 (open-output-string))
(print-queue (delete-queue! q1) op5)
(define display-result-5 (get-output-string op5))
(check-equal? display-result-5 "()")
(close-output-port op5)
