<p>{{ __('exercises/5_41.description.1') }}
<code>find-variable</code>
{{ __('exercises/5_41.description.2') }}
<code>&lt;e1&gt;</code>
{{ __('exercises/5_41.description.3') }}
<code>((y z) (a b c d e) (x y))</code>
{{ __('exercises/5_41.description.4') }}
<code>Find-variable</code>
{{ __('exercises/5_41.description.5') }}
</p>
<pre><code>(find-variable 'c '((y z) (a b c d e) (x y)))
<i>(1 2)</i>

(find-variable 'x '((y z) (a b c d e) (x y)))
<i>(2 0)</i>

(find-variable 'w '((y z) (a b c d e) (x y)))
<i>not-found</i>
</code></pre>
