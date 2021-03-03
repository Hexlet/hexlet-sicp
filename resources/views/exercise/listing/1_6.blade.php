<p>{{ __('exercises/1_6.description.1') }}</p>
<pre><code>(define (new-if predicate then-clause else-clause)
  (cond (predicate then-clause)
        (else else-clause)))</code></pre>
<p>{{ __('exercises/1_6.description.2') }}</p>
<pre><code>(new-if (= 2 3) 0 5)
<i>5</i>

(new-if (= 1 1) 0 5)
<i>0</i></code></pre>
<p>{{ __('exercises/1_6.description.3') }}</p>
<pre><code>(define (sqrt-iter guess x)
  (new-if (good-enough? guess x)
          guess
          (sqrt-iter (improve guess x)
                     x)))
</code></pre>
<p>{{ __('exercises/1_6.description.4') }}</p>
