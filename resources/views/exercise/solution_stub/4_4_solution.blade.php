(define (first-pred pred-seq) (car pred-seq))

(define (rest-preds pred-seq) (cdr pred-seq))

(define (no-preds? pred-seq) (eq? pred-seq '()))

(define (and-preds exp) (cdr exp))

(define (or-preds exp) (cdr exp))

 (define (eval-and-preds pred-seq env) 
   (let ((val (eval (first-pred pred-seq) env))) 
     (cond ((no-preds? (rest-preds pred-seq)) val) 
           ((not (true? val)) 'false) 
           (else (eval-and-preds (rest-preds pred-seq) env)))))

(define (eval-and exp env) 
   (let ((pred-seq (and-preds exp))) 
     (if (no-preds? pred-seq) 
         'true 
         (eval-and-preds pred-seq env))))  
  

(define (eval-or-preds pred-seq env) 
   (let ((val (eval (first-pred pred-seq) env))) 
     (cond ((no-preds? (rest-preds pred-seq)) val) 
           ((true? val) val) 
           (else (eval-or-preds (rest-preds pred-seq) env)))))

(define (eval-or exp env) 
   (let ((pred-seq (or-preds exp))) 
     (if (no-preds? pred-seq) 
         'false 
         (eval-or-preds pred-seq env))))
