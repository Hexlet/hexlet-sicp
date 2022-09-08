<p>{{ __('exercises/2_2.description.1') }}
<code>make-segment</code>
{{ __('exercises/2_2.description.2') }}
<code>start-segment</code>
{{ __('exercises/2_2.description.3') }}
<code>end-segment</code>
{{ __('exercises/2_2.description.4') }}
<code>x</code>
{{ __('exercises/2_2.description.5') }}
<code>y</code>
{{ __('exercises/2_2.description.6') }}
<code>make-point</code>
{{ __('exercises/2_2.description.7') }}
<code>x-point</code>
{{ __('exercises/2_2.description.8') }}
<code>y-point</code>
{{ __('exercises/2_2.description.9') }}
<code>midpoint-segment</code>
{{ __('exercises/2_2.description.10') }}
</p>
<pre><code>(define (print-point p)
  (newline)
  (display "(")
  (display (x-point p))
  (display ",")
  (display (y-point p))
  (display ")"))
</code></pre>
