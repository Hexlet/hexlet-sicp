<p>{{ __('exercises/3_51.description.1') }}</p>
<pre><code>(define (show x)
  (display-line x)
  x)
</code></pre>
<p>{{ __('exercises/3_51.description.2') }}</p>
<pre><code>(define x (stream-map show (stream-enumerate-interval 0 10)))

(stream-ref x 5)

(stream-ref x 7)
</code></pre>
