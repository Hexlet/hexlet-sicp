<p>{{ __('exercises/2_6.description.1') }}
<code>0</code>
{{ __('exercises/2_6.description.2') }}
<code>1</code>
{{ __('exercises/2_6.description.3') }}
</p>
<pre><code>(define zero (lambda (f) (lambda (x) x)))

(define (add-1 n)
  (lambda (f) (lambda (x) (f ((n f) x)))))
</code></pre>
<p>{{ __('exercises/2_6.description.4') }}</p>
<p>{{ __('exercises/2_6.description.5') }}
<code>one</code>
{{ __('exercises/2_6.description.6') }}
<code>two</code>
{{ __('exercises/2_6.description.7') }}
<code>zero</code>
{{ __('exercises/2_6.description.8') }}
<code>add-1</code>
{{ __('exercises/2_6.description.9') }}
<code>(add-1 zero)</code>
{{ __('exercises/2_6.description.10') }}
<code>add</code>
{{ __('exercises/2_6.description.11') }}
<code>add-1</code>
{{ __('exercises/2_6.description.12') }}
</p>
