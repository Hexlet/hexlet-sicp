<p>{{ __('exercises/3_68.description.1') }}
<code>(S₀, T₀)</code>
{{ __('exercises/3_68.description.2') }}
</p>
<pre><code>(define (pairs s t)
  (interleave
   (stream-map (lambda (x) (list (stream-car s) x))
               t)
   (pairs (stream-cdr s) (stream-cdr t))))
</code></pre>
<p>{{ __('exercises/3_68.description.3') }}
<code>(pairs integers integers)</code>
{{ __('exercises/3_68.description.4') }}
</p>
