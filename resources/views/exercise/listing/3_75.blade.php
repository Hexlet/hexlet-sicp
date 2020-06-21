<p>{{ __('exercises/3_75.description.1') }}</p>
<pre><code>(define (make-zero-crossings input-stream last-value)
  (let ((avpt (/ (+ (stream-car input-stream) last-value) 2)))
    (cons-stream (sign-change-detector avpt last-value)
                 (make-zero-crossings (stream-cdr input-stream)
                                      avpt))))
</code></pre>
<p>{{ __('exercises/3_75.description.2') }}</p>
