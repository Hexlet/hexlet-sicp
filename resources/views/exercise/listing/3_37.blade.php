<p>{{ __('exercises/3_37.description.1') }}</p>
<pre><code>(define (celsius-fahrenheit-converter x)
  (c+ (c* (c/ (cv 9) (cv 5))
          x)
      (cv 32)))

(define C (make-connector))

(define F (celsius-fahrenheit-converter C))
</code></pre>
<p>{{ __('exercises/3_37.description.2') }}</p>
<pre><code>(define (c+ x y)
  (let ((z (make-connector)))
    (adder x y z)
    z))
</code></pre>
<p>{{ __('exercises/3_37.description.3') }}</p>
