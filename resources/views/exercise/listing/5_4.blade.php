<p>{{ __('exercises/5_4.description.1') }}</p>
<p>{{ __('exercises/5_4.description.2') }}</p>
<pre><code>(define (expt b n)
  (if (= n 0)
      1
      (* b (expt b (- n 1)))))</code></pre>
<p>{{ __('exercises/5_4.description.3') }}</p>
<pre><code>(define (expt b n)
  (define (expt-iter counter product)
    (if (= counter 0)
        product
        (expt-iter (- counter 1) (* b product))))
  (expt-iter n 1))</code></pre>
