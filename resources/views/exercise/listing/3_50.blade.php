<p>{{ __('exercises/3_50.description') }}</p>
<pre><code>(define (stream-map proc . argstreams)
  (if (&lt;??&gt; (car argstreams))
      the-empty-stream
      (&lt;??&gt;
       (apply proc (map &lt;??&gt; argstreams))
       (apply stream-map
              (cons proc (map &lt;??&gt; argstreams))))))
</code></pre>
