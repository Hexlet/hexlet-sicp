<p>{{ __('exercises/2_28.description') }}</p>
<pre><code>(define x (list (list 1 2) (list 3 4)))

(fringe x)
(1 2 3 4)

(fringe (list x x))
(1 2 3 4 1 2 3 4)
</code></pre>
