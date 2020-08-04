<p>{{ __('exercises/5_21.description.1') }}</p>
<pre><code>(define (count-leaves tree)
  (cond ((null? tree) 0)
        ((not (pair? tree)) 1)
        (else (+ (count-leaves (car tree))
                 (count-leaves (cdr tree))))))
</code></pre>
<p>{{ __('exercises/5_21.description.2') }}</p>
<pre><code>(define (count-leaves tree)
  (define (count-iter tree n)
    (cond ((null? tree) n)
          ((not (pair? tree)) (+ n 1))
          (else (count-iter (cdr tree)
                            (count-iter (car tree) n)))))
  (count-iter tree 0))
</code></pre>
<p>{{ __('exercises/5_21.description.3') }}</p>
