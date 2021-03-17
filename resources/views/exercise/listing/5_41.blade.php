<p>{{ __('exercises/5_41.description') }}</p>
<pre><code>(find-variable 'c '((y z) (a b c d e) (x y)))
<i>(1 2)</i>

(find-variable 'x '((y z) (a b c d e) (x y)))
<i>(2 0)</i>

(find-variable 'w '((y z) (a b c d e) (x y)))
<i>not-found</i>
</code></pre>
