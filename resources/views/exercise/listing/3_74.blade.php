<p>{{ __('exercises/3_74.description.1') }}</p>
<pre><code>
...1  2  1.5  1  0.5  -0.1  -2  -3  -2  -0.5  0.2  3  4 ...
...0  0   0   0    0    -1   0   0   0    0    1   0  0 ...
</code></pre>
<p>{{ __('exercises/3_74.description.2') }}</p>
<pre><code>(define (make-zero-crossings input-stream last-value)
  (cons-stream
   (sign-change-detector (stream-car input-stream) last-value)
   (make-zero-crossings (stream-cdr input-stream)
                        (stream-car input-stream))))

(define zero-crossings (make-zero-crossings sense-data 0))
</code></pre>
<p>{{ __('exercises/3_74.description.3') }}</p>
<pre><code>(define zero-crossings
  (stream-map sign-change-detector sense-data &lt;expression&gt;))
</code></pre>
<p>{{ __('exercises/3_74.description.4') }}</p>
