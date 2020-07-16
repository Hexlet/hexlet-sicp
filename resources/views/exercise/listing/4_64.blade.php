<p>{{ __('exercises/4_64.description.1') }}</p>
<pre><code>(rule (outranked-by ?staff-person ?boss)
      (or (supervisor ?staff-person ?boss)
          (and (outranked-by ?middle-manager ?boss)
               (supervisor ?staff-person ?middle-manager))))
</code></pre>
<p>{{ __('exercises/4_64.description.2') }}</p>
<pre><code>(outranked-by (Bitdiddle Ben) ?who)
</code></pre>
<p>{{ __('exercises/4_64.description.3') }}</p>
