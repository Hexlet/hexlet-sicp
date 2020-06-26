<p>{{ __('exercises/3_58.description.1') }}</p>
<pre><code>(define (expand num den radix)
  (cons-stream
   (quotient (* num radix) den)
   (expand (remainder (* num radix) den) den radix)))
</code></pre>
<p>{{ __('exercises/3_58.description.2') }}</p>
