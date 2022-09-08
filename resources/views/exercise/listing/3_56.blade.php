<p>{{ __('exercises/3_56.description.1') }}
<code>2, 3</code>
{{ __('exercises/3_56.description.2') }}
<code>5</code>
{{ __('exercises/3_56.description.3') }}
<code>2, 3</code>
{{ __('exercises/3_56.description.4') }}
<code>5</code>
{{ __('exercises/3_56.description.5') }}
<code>S</code>
{{ __('exercises/3_56.description.6') }}
</p>
<p>{{ __('exercises/3_56.description.7') }}
<code>S</code>
{{ __('exercises/3_56.description.8') }}
<code>1</code>
{{ __('exercises/3_56.description.9') }}
</p>
<p>{{ __('exercises/3_56.description.10') }}
<code>(scale-streams 2)</code>
{{ __('exercises/3_56.description.11') }}
<code>S</code>
{{ __('exercises/3_56.description.12') }}
</p>
<p>{{ __('exercises/3_56.description.13') }}
<code>(scale-stream S 3)</code>
{{ __('exercises/3_56.description.14') }}
<code>(scale-stream S 5)</code>
{{ __('exercises/3_56.description.15') }}
</p>
<p>{{ __('exercises/3_56.description.16') }}
<code>S</code>
{{ __('exercises/3_56.description.17') }}
</p>
<p>{{ __('exercises/3_56.description.18') }}
<code>merge</code>
{{ __('exercises/3_56.description.19') }}
</p>
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
<p>{{ __('exercises/3_56.description.20') }}
<code>merge</code>
{{ __('exercises/3_56.description.21') }}
</p>
<pre><code>(define S (cons-stream 1 (merge &lt;??&gt; &lt;??&gt;)))
</code></pre>
<p>{{ __('exercises/3_56.description.22') }}
<code>&lt;??&gt;</code>
{{ __('exercises/3_56.description.23') }}
</p>
