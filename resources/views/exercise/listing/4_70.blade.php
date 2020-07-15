<p>{{ __('exercises/4_70.description') }}</p>
<pre><code>(define (add-assertion! assertion)
  (store-assertion-in-index assertion)
  (set! THE-ASSERTIONS
        (cons-stream assertion THE-ASSERTIONS))
  'ok)
</code></pre>
