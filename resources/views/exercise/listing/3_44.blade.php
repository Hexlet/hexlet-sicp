<p>{{ __('exercises/3_44.description.1') }}</p>
<pre><code>(define (transfer from-account to-account amount)
  ((from-account 'withdraw) amount)
  ((to-account 'deposit) amount))
</code></pre>
<p>{{ __('exercises/3_44.description.2') }}</p>
