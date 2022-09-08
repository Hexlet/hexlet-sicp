<p>{{ __('exercises/4_25.description.1') }}
<code>unless</code>
{{ __('exercises/4_25.description.2') }}
<code>factorial</code>
{{ __('exercises/4_25.description.3') }}
<code>unless</code>
{{ __('exercises/4_25.description.4') }}
</p>
<pre><code>(define (factorial n)
  (unless (= n 1)
          (* n (factorial (- n 1)))
          1))</code></pre>
<p>{{ __('exercises/4_25.description.5') }}
<code>(factorial 5)</code>
{{ __('exercises/4_25.description.6') }}
</p>
