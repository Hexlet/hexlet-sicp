<p>{{ __('exercises/3_68.description.1') }}</p>
<pre><code>(define (pairs s t)
  (interleave
   (stream-map (lambda (x) (list (stream-car s) x))
               t)
   (pairs (stream-cdr s) (stream-cdr t))))
</code></pre>
<p>{{ __('exercises/3_68.description.2') }}</p>
