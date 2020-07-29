<p>{{ __('exercises/5_34.description.1') }}</p>
<pre><code>(define (factorial n)
  (define (iter product counter)
    (if (> counter n)
        product
        (iter (* counter product)
              (+ counter 1))))
  (iter 1 1))
</code></pre>
<p>{{ __('exercises/5_34.description.2') }}</p>
