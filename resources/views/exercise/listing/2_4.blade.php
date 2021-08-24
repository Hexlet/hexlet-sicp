<p>{{ __('exercises/2_4.description.1') }}
<code>(car (cons x y))</code>
{{ __('exercises/2_4.description.2') }}
<code>x</code>
{{ __('exercises/2_4.description.3') }}
<code>x</code>
{{ __('exercises/2_4.description.4') }}
<code>y</code>
{{ __('exercises/2_4.description.5') }}
</p>
<pre><code>(define (cons x y)
  (lambda (m) (m x y)))

(define (car z)
  (z (lambda (p q) p)))
</code></pre>
<p>{{ __('exercises/2_4.description.6') }}
<code>cdr</code>
{{ __('exercises/2_4.description.7') }}
</p>
