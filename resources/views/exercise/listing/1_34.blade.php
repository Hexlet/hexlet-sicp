<p>{{ __('exercises/1_34.description.1') }}</p>
<pre><code>(define (f g)
  (g 2))
</code></pre>
<p>{{ __('exercises/1_34.description.2') }}</p>
<pre><code>(f square)
<i>4</i>

(f (lambda (z) (* z (+ z 1))))
<i>6</i>
</code></pre>
<p>{{ __('exercises/1_34.description.3') }}
<code>(f f)</code>
{{ __('exercises/1_34.description.4') }}
</p>
