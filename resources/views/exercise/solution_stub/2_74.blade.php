#lang racket/base
(require rackunit)

;;; BEGIN
{!! $solution !!}
;;; END

(define (attach-tag type-tag contents)
  (cons type-tag contents))

(define (type-tag datum)
  (if (pair? datum)
    (car datum)
    (error "bad tagged data -- TYPE-TAG" datum)))


(define Ben (list (cons 'name "Bitdiddle Ben") (cons 'address "Slumerville") (cons 'position "computer wizard") (cons 'salary "60000")))
(define Alyssa (list (cons 'name "Hacker Alyssa P") (cons 'address "Cambridge") (cons 'position "computer programmer") (cons 'salary "40000")))

(define ins-div1-records (list Ben Alyssa))

(define Fect (list "Fect Cy D" (list "computer programmer" "Cambridge"  35000)))
(define Tweakit (list "Tweakit Lem E" (list "computer technician" "Boston" 25000)))

(define ins-div2-records(list Fect Tweakit))

(define typed-ins1
  (attach-tag 'ins1-record ins-div1-records))

(define typed-ins2
  (attach-tag 'ins2-record ins-div2-records))


(check-equal? (find-employee-record (list typed-ins1 typed-ins2) "Bitdiddle Ben") Ben)
(check-equal? (find-employee-record (list typed-ins1 typed-ins2) "Tweakit Lem E") Tweakit)
(check-equal? (cdr (get-record typed-ins1 "Hacker Alyssa P")) Alyssa)
(check-equal? (get-record typed-ins2 "Hacker Alyssa P") '())
(check-equal? (cdr (get-record typed-ins2 "Fect Cy D")) Fect)
(check-equal? (get-record typed-ins1 "Fect Cy D") '())
(check-equal? (get-salary (get-record typed-ins1 "Bitdiddle Ben")) "60000")
(check-equal? (get-salary (get-record typed-ins2 "Fect Cy D")) 35000)
