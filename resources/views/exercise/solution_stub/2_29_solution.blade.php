(define (make-mobile left right) (list left right))
(define (left-branch mobile) (car mobile))
(define (right-branch mobile) (car (cdr mobile)))
(define (make-branch length structure) (list length structure))
(define (branch-length branch) (car branch))
(define (branch-structure branch) (car (cdr branch)))

(define (total-weight mobile)
 (cond ((null? mobile) 0)
       ((not (pair? mobile)) mobile)
       (else (+ (total-weight (branch-structure (left-branch mobile)))
                (total-weight (branch-structure (right-branch mobile)))))))


(define (torque branch)
 (* (branch-length branch) (total-weight (branch-structure branch))))

(define (mobile-balanced? mobile)
 (if (not (pair? mobile))
     #t
     (and (= (torque (left-branch mobile)) (torque (right-branch mobile)))
          (mobile-balanced? (branch-structure (left-branch mobile)))
          (mobile-balanced? (branch-structure (right-branch mobile))))))
