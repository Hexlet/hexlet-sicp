<p>{{ __('exercises/4_15.description.1') }}
<code>p</code>
{{ __('exercises/4_15.description.2') }}
<code>a</code>
{{ __('exercises/4_15.description.3') }}
<code>p</code>
{{ __('exercises/4_15.description.4') }}
<code>a</code>
{{ __('exercises/4_15.description.5') }}
<code>(p a)</code>
{{ __('exercises/4_15.description.6') }}
<code>halts?</code>
{{ __('exercises/4_15.description.7') }}
<code>p</code>
{{ __('exercises/4_15.description.8') }}
<code>a</code>
{{ __('exercises/4_15.description.9') }}
<code>p</code>
{{ __('exercises/4_15.description.10') }}
<code>a</code>
{{ __('exercises/4_15.description.11') }}
<code>halts?</code>
{{ __('exercises/4_15.description.12') }}
</p>
<pre><code>(define (run-forever) (run-forever))

(define (try p)
  (if (halts? p p)
      (run-forever)
      'halted))</code></pre>
<p>{{ __('exercises/4_15.description.13') }}
<code>(try try)</code>
{{ __('exercises/4_15.description.14') }}
<code>halts?</code>
{{ __('exercises/4_15.description.15') }}
</p>
