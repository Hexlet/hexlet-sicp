<p>{{ __('exercises/4_73.description.1') }}
<code>flatten-stream</code>
{{ __('exercises/4_73.description.2') }}
<code>delay</code>
{{ __('exercises/4_73.description.3') }}
</p>
<pre><code>(define (flatten-stream stream)
  (if (stream-null? stream)
      the-empty-stream
      (interleave
       (stream-car stream)
       (flatten-stream (stream-cdr stream)))))
</code></pre>
