<p>
    {{ __('exercises/3_16.description1') }}
    <code>car</code>
    {{ __('exercises/3_16.description2') }}
    <code>cdr</code>
    {{ __('exercises/3_16.description3') }}
</p>
<pre><code>(define (count-pairs x)
  (if (not (pair? x))
      0
      (+ (count-pairs (car x))
         (count-pairs (cdr x))
         1)))</code></pre>
<p>
    {{ __('exercises/3_16.description4') }}
</p>