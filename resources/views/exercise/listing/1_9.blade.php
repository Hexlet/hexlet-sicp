<p>{{ __('exercises/1_9.description.1') }}</p>
<pre><code>
(define (+ a b)
  if (= a 0)
      b
      (inc (+ (dec a) b))))

(define (+ a b)
  (if (= a 0)
      b
      (+ (dec a) (inc b))))
</code></pre>
<p>{{ __('exercises/1_9.description.2') }}</p>
