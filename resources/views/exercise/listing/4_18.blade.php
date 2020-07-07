<p>{{ __('exercises/4_18.description.1') }}</p>
<pre><code>(lambda <vars>
  (let ((u '*unassigned*)
        (v '*unassigned*))
    (let ((a <e1>)
          (b <e2>))
      (set! u a)
      (set! v b))
    <e3>))</code></pre>
<p>{{ __('exercises/4_18.description.2') }}</p>
<pre><code>(define (solve f y0 dt)
  (define y (integral (delay dy) y0 dt))
  (define dy (stream-map f y))
  y)</code></pre>
<p>{{ __('exercises/4_18.description.3') }}</p>
