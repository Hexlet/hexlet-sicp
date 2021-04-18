#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END


(define nested-left-branch (make-branch 4 5))

(define nested-right-branch (make-branch nested-left-branch (make-branch 6 7)))

(define left (make-branch 1 2))

(define right (make-branch 3 nested-right-branch))

(define mobile (make-mobile left right))

(define mobile2 (make-mobile (make-branch 5 2)
                            (make-branch 1 10)))


(check-equal? (total-weight mobile) 14)
(check-equal? (total-weight mobile2) 12)
(check-equal? (left-branch mobile) left)
(check-equal? (right-branch mobile) right)
(check-equal? (branch-length left) 1)
(check-equal? (branch-structure right) '((4 5) (6 7)))
(check-equal? (mobile-balanced? mobile) #f)
(check-equal? (mobile-balanced? mobile2) #t)
