<p>{{ __('exercises/1_26.description.1') }}<a href="{{ route('exercises.show', App\Models\Exercise::findByPath('1.24')) }}">1.24</a>
{{ __('exercises/1_26.description.2') }}
<code>fast-prime?</code>
{{ __('exercises/1_26.description.3') }}
<code>prime?</code>
{{ __('exercises/1_26.description.4') }}
<code>expmod</code>
{{ __('exercises/1_26.description.5') }}
<code>square</code>
{{ __('exercises/1_26.description.6') }}
</p>
<pre><code>(define (expmod base exp m)
  (cond ((= exp 0) 1)
        ((even? exp)
         (remainder (* (expmod base (/ exp 2) m)
                       (expmod base (/ exp 2) m))
                    m))
        (else
         (remainder (* base (expmod base (- exp 1) m))
                    m)))
</code></pre>
<p>{{ __('exercises/1_26.description.7') }}</p>
