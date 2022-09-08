<p>{{ __('exercises/4_74.description.1') }}
<code>stream-flatmap</code>
{{ __('exercises/4_74.description.2') }}
<code>negate</code>
{{ __('exercises/4_74.description.3') }}
<code>lisp-value</code>
{{ __('exercises/4_74.description.4') }}
<code>find-assertions</code>
{{ __('exercises/4_74.description.5') }}
</p>
<p>{{ __('exercises/4_74.description.6') }}</p>
<pre><code>(define (simple-stream-flatmap proc s)
  (simple-flatten (stream-map proc s)))

(define (simple-flatten stream)
  (stream-map &lt;??&gt;
              (stream-filter &lt;??&gt; stream)))
</code></pre>
<p>{{ __('exercises/4_74.description.7') }}</p>
