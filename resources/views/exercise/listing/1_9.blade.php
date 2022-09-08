<p>{{ __('exercises/1_9.description.1') }}
<code>inc</code>
{{ __('exercises/1_9.description.2') }}
<code>dec</code>
{{ __('exercises/1_9.description.3') }}
</p>
<pre><code>(define (+ a b)
  (if (= a 0)
      b
      (inc (+ (dec a) b))))

(define (+ a b)
  (if (= a 0)
      b
      (+ (dec a) (inc b))))
</code></pre>
<p>{{ __('exercises/1_9.description.4') }}
<code>(+ 4 5)</code>
{{ __('exercises/1_9.description.5') }}
</p>
