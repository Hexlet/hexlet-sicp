<p>{{ __('exercises/4_74.description.1') }}</p>
<p>{{ __('exercises/4_74.description.2') }}</p>
<pre><code>(define (simple-stream-flatmap proc s)
  (simple-flatten (stream-map proc s)))

(define (simple-flatten stream)
  (stream-map &lt;??&gt;
              (stream-filter &lt;??&gt; stream)))
</code></pre>
<p>{{ __('exercises/4_74.description.3') }}</p>
