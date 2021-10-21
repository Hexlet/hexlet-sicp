<p>{{ __('exercises/3_63.description.1') }}
<code>sqrt-stream</code>
{{ __('exercises/3_63.description.2') }}
<code>guesses</code>
{{ __('exercises/3_63.description.3') }}
</p>
<pre><code>(define (sqrt-stream x)
  (cons-stream 1.0
               (stream-map (lambda (guess)
                             (sqrt-improve guess x))
                           (sqrt-stream x))))
</code></pre>
<p>{{ __('exercises/3_63.description.4') }}
<code>delay</code>
{{ __('exercises/3_63.description.5') }}
<code>(lambda () &lt;exp&gt;)</code>
{{ __('exercises/3_63.description.6') }}
<code>memo-proc</code>
{{ __('exercises/3_63.description.7') }}
</p>
