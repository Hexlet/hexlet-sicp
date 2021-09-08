<p>{{ __('exercises/2_28.description.1') }}
<code>fringe</code>
{{ __('exercises/2_28.description.2') }}
</p>
<pre><code>(define x (list (list 1 2) (list 3 4)))

(fringe x)
<i>(1 2 3 4)</i>

(fringe (list x x))
<i>(1 2 3 4 1 2 3 4)</i>
</code></pre>
