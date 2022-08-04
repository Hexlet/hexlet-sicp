<p>{{ __('exercises/3_64.description.1') }}
<code>stream-limit</code>
{{ __('exercises/3_64.description.2') }}
</p>
<pre><code>(define (sqrt x tolerance)
  (stream-limit (sqrt-stream x) tolerance))
</code></pre>
