(define (or-gate a1 a2 output)
   (define (or-action-procedure)
         (let ((new-value
                 (logic-or (get-signal a1) (get-signal a2))))
           (after-delay or-gate-delay
                        (lambda ()
                          (set-signal! output new-value)))))
   (add-action! a1 or-action-procedure)
   (add-action! a2 or-action-procedure))
 (define (logic-or s1 s2)
   (if (or (= s1 1) (= s2 1))
         1
         0))
