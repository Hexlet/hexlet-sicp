<p>{{ __('exercises/3_50.description') }}</p>
<pre><code>(map + (list 1 2 3) (list 40 50 60) (list 700 800 900))
<i>(741 852 963)</i>

(map (lambda (x y) (+ x (* 2 y)))
     (list 1 2 3)
     (list 4 5 6))
<i>(9 12 15)</i>


(define (stream-map proc . argstreams)
  (if (&lt;??&gt; (car argstreams))
      the-empty-stream
      (&lt;??&gt;
       (apply proc (map &lt;??&gt; argstreams))
       (apply stream-map
              (cons proc (map &lt;??&gt; argstreams))))))
</code></pre>
