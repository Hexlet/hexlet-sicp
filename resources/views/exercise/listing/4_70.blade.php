<p>{{ __('exercises/4_70.description.1') }}
<code>let</code>
{{ __('exercises/4_70.description.2') }}
<code>add-assertion!</code>
{{ __('exercises/4_70.description.3') }}
<code>add-rule!</code>
{{ __('exercises/4_70.description.4') }}
<code>add-assertion!</code>
{{ __('exercises/4_70.description.5') }}
<code>(define ones (cons-stream 1 ones))</code>
{{ __('exercises/4_70.description.6') }}
</p>
<pre><code>(define (add-assertion! assertion)
  (store-assertion-in-index assertion)
  (set! THE-ASSERTIONS
        (cons-stream assertion THE-ASSERTIONS))
  'ok)
</code></pre>
