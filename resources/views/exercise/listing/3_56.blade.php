<p>{{ __('exercises/3_56.description.1') }}</p>
<p>{{ __('exercises/3_56.description.2') }}</p>
<p>{{ __('exercises/3_56.description.3') }}</p>
<p>{{ __('exercises/3_56.description.4') }}</p>
<p>{{ __('exercises/3_56.description.5') }}</p>
<p>{{ __('exercises/3_56.description.6') }}</p>
<pre><code>(define (merge s1 s2)
  (cond ((stream-null? s1) s2)
        ((stream-null? s2) s1)
        (else
         (let ((s1car (stream-car s1))
               (s2car (stream-car s2)))
           (cond ((< s1car s2car)
                  (cons-stream s1car (merge (stream-cdr s1) s2)))
                 ((> s1car s2car)
                  (cons-stream s2car (merge s1 (stream-cdr s2))))
                 (else
                  (cons-stream s1car
                               (merge (stream-cdr s1)
                                      (stream-cdr s2)))))))))
</code></pre>
<p>{{ __('exercises/3_56.description.7') }}</p>
<pre><code>(define S (cons-stream 1 (merge &lt;??&gt; &lt;??&gt;)))
</code></pre>
<p>{{ __('exercises/3_56.description.8') }}</p>
