(define (cube x) (* x x x))

(define (pair-weight-ramanujan pair)
  (+ (cube (car pair)) (cube (cadr pair))))

(define (stream-map proc . argstreams)
  (if (stream-empty? (car argstreams))
      empty-stream
      (stream-cons
       (apply proc (map stream-first argstreams))
       (apply stream-map (cons proc (map stream-rest argstreams))))))

(define (generate-numbers stream-of-pairs weight-proc)
  (let ((p1 (stream-first stream-of-pairs)) (p2 (stream-first (stream-rest stream-of-pairs))))
    (if (= (weight-proc p1) (weight-proc p2))
        (stream-cons
         (weight-proc p1)
         (generate-numbers (stream-rest stream-of-pairs) weight-proc))
        (generate-numbers (stream-rest stream-of-pairs) weight-proc))))

(define (merge-weighted s1 s2 weight)
  (cond
    ((stream-empty? s1) s2)
    ((stream-empty? s2) s1)
    (else
     (let ((s1car (stream-first s1)) (s2car (stream-first s2)))
       (cond
         ((< (weight s1car) (weight s2car))
          (stream-cons s1car (merge-weighted (stream-rest s1) s2 weight))
          )
         ((> (weight s1car) (weight s2car))
          (stream-cons s2car (merge-weighted s1 (stream-rest s2) weight))
          )
         (else
          (stream-cons
           s1car
           (stream-cons
            s2car
            (merge-weighted (stream-rest s1) (stream-rest s2) weight)))))))))


(define (weighted-pairs s t weight)
  (stream-cons
   (list (stream-first s) (stream-first t))
   (merge-weighted
    (stream-map (lambda (x) (list (stream-first s) x)) (stream-rest t))
    (weighted-pairs (stream-rest s) (stream-rest t) weight)
    weight)))

(define (add-streams s1 s2)
  (stream-map + s1 s2))

(define ones (stream-cons 1 ones))

(define integers (stream-cons 1 (add-streams ones integers)))

(define P (weighted-pairs integers integers pair-weight-ramanujan))
(define ramanujan-numbers (generate-numbers P pair-weight-ramanujan))
