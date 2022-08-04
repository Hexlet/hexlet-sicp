<p>{{ __('exercises/4_18.description.1') }}</p>
<pre><code>(lambda &lt;vars&gt;
  (let ((u '*unassigned*)
        (v '*unassigned*))
    (let ((a &lt;e1&gt;)
          (b &lt;e2&gt;))
      (set! u a)
      (set! v b))
    &lt;e3&gt;))</code></pre>
<p>{{ __('exercises/4_18.description.2') }}
<code>a</code>
{{ __('exercises/4_18.description.3') }}
<code>b</code>
{{ __('exercises/4_18.description.4') }}
<code>solve</code>
{{ __('exercises/4_18.description.5') }}
</p>
<pre><code>(define (solve f y0 dt)
  (define y (integral (delay dy) y0 dt))
  (define dy (stream-map f y))
  y)</code></pre>
<p>{{ __('exercises/4_18.description.6') }}</p>
