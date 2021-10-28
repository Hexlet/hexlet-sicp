<p>{{ __('exercises/3_77.description.1') }}
<code>integral</code>
{{ __('exercises/3_77.description.2') }}
<code>integral</code>
{{ __('exercises/3_77.description.3') }}
<code>integers-starting-from</code>
{{ __('exercises/3_77.description.4') }}
</p>
<pre><code>(define (integral integrand initial-value dt)
  (cons-stream initial-value
               (if (stream-null? integrand)
                   the-empty-stream
                   (integral (stream-cdr integrand)
                             (+ (* dt (stream-car integrand))
                                initial-value)
                             dt))))
</code></pre>
<p>{{ __('exercises/3_77.description.5') }}
<code>integral</code>
{{ __('exercises/3_77.description.6') }}
<code>integrand</code>
{{ __('exercises/3_77.description.7') }}
<code>solve</code>
{{ __('exercises/3_77.description.8') }}
</p>
