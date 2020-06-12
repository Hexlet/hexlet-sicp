<p>
    {{ __('exercises/3_13.description1') }}
    <code>make-cycle</code>
    {{ __('exercises/3_13.description2') }}
    <code>last-pair</code>
    {{ __('exercises/3_13.description3') }}
    <a title="3.12" href="{{ route('exercises.show', ($exercise->id - 1)) }}">3.12</a>
    {{ __('exercises/3_13.description4') }}
</p>
<pre><code>(define (make-cycle x)
  (set-cdr! (last-pair x) x)
  x)</code></pre>
<p>
    {{ __('exercises/3_13.description5') }}
    <code>z</code>
    {{ __('exercises/3_13.description6') }}
</p>
<pre><code>(define z (make-cycle (list 'a 'b 'c)))</code></pre>
<p>
    {{ __('exercises/3_13.description7') }}
    <code>(last-pair z)</code>
    {{ __('exercises/3_13.description8') }}
</p>
