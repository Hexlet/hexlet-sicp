<p>{{ __('exercises/4_73.description') }}</p>
<pre><code>(define (flatten-stream stream)
  (if (stream-null? stream)
      the-empty-stream
      (interleave
       (stream-car stream)
       (flatten-stream (stream-cdr stream)))))
</code></pre>
