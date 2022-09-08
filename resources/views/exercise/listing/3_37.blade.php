<p>{{ __('exercises/3_37.description.1') }}
<code>celsius-fahrenheit-converter</code>
{{ __('exercises/3_37.description.2') }}
</p>
<pre><code>(define (celsius-fahrenheit-converter x)
  (c+ (c* (c/ (cv 9) (cv 5))
          x)
      (cv 32)))

(define C (make-connector))

(define F (celsius-fahrenheit-converter C))
</code></pre>
<p>{{ __('exercises/3_37.description.3') }}
<code>c+</code>
{{ __('exercises/3_37.description.4') }}
<code>c*</code>
{{ __('exercises/3_37.description.5') }}
<code>c+</code>
{{ __('exercises/3_37.description.6') }}
</p>
<pre><code>(define (c+ x y)
  (let ((z (make-connector)))
    (adder x y z)
    z))
</code></pre>
<p>{{ __('exercises/3_37.description.7') }}
<code>c-</code>
{{ __('exercises/3_37.description.8') }}
<code>c*</code>
{{ __('exercises/3_37.description.9') }}
<code>c/</code>
{{ __('exercises/3_37.description.10') }}
<code>cv</code>
{{ __('exercises/3_37.description.11') }}
</p>
