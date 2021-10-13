<p>{{ __('exercises/3_44.description.1') }}
<code>make-account</code>
{{ __('exercises/3_44.description.2') }}
</p>
<pre><code>(define (transfer from-account to-account amount)
  ((from-account 'withdraw) amount)
  ((to-account 'deposit) amount))
</code></pre>
<p>{{ __('exercises/3_44.description.3') }}
<code>from-account</code>
{{ __('exercises/3_44.description.4') }}
<code>amount</code>
{{ __('exercises/3_44.description.5') }}
</p>
