<p>{{ __('exercises/4_35.description.1') }}
<code>an-integer-between</code>
{{ __('exercises/4_35.description.2') }}
<code>(i, j, k)</code>
{{ __('exercises/4_35.description.3') }}
<code>i ≤ j</code>
{{ __('exercises/4_35.description.4') }}
<code>i² + j² = k²</code>
{{ __('exercises/4_35.description.5') }}
</p>
<pre><code>(define (a-pythagorean-triple-between low high)
  (let ((i (an-integer-between low high)))
    (let ((j (an-integer-between i high)))
      (let ((k (an-integer-between j high)))
        (require (= (+ (* i i) (* j j)) (* k k)))
        (list i j k)))))</code></pre>
