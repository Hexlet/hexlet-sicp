<p>{{ __('exercises/3_58.description.1') }}</p>
<pre><code>(define (expand num den radix)
  (cons-stream
   (quotient (* num radix) den)
   (expand (remainder (* num radix) den) den radix)))
</code></pre>
<p>{{ __('exercises/3_58.description.2') }}
<code>quotient</code>
{{ __('exercises/3_58.description.3') }}
<code>(expand 1 7 10)</code>
{{ __('exercises/3_58.description.4') }}
<code>(expand 3 8 10)</code>
{{ __('exercises/3_58.description.5') }}
</p>
