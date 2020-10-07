<p>{{ __('exercises/1_10.description.1') }}</p>
<pre><code>(define (A x y)
  (cond ((= y 0) 0)
        ((= x 0) (* 2 y))
        ((= y 1) 2)
        (else (A (- x 1)
                 (A x (- y 1))))))
</code></pre>
<p>{{ __('exercises/1_10.description.2') }}</p>
<pre><code>(A 1 10)

(A 2 4)

(A 3 3)
</code></pre>
<p>{{ __('exercises/1_10.description.3') }}</p>
<pre><code>(define (f n) (A 0 n))

(define (g n) (A 1 n))

(define (h n) (A 2 n))

(define (k n) (* 5 n n))
</code></pre>
<p>{{ __('exercises/1_10.description.4') }}</p>
