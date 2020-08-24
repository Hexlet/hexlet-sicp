<p>
    {{ __('exercises/3_16.description.1') }}
    <code>car</code>
    {{ __('exercises/3_16.description.2') }}
    <code>cdr</code>
    {{ __('exercises/3_16.description.3') }}
</p>
<pre><code>(define (count-pairs x)
  (if (not (pair? x))
      0
      (+ (count-pairs (car x))
         (count-pairs (cdr x))
         1)))</code></pre>
<p>
    {{ __('exercises/3_16.description.4') }}
</p>
