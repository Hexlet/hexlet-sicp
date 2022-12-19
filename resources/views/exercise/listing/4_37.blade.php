<p>{{ __('exercises/4_37.description.1') }}<a href="{{ route('exercises.show', App\Models\Exercise::findByPath('4.35')) }}">4.35</a>
{{ __('exercises/4_37.description.2') }}</p>
<pre><code>(define (a-pythagorean-triple-between low high)
  (let ((i (an-integer-between low high))
        (hsq (* high high)))
    (let ((j (an-integer-between i high)))
      (let ((ksq (+ (* i i) (* j j))))
        (require (>= hsq ksq))
        (let ((k (sqrt ksq)))
          (require (integer? k))
          (list i j k))))))</code></pre>
