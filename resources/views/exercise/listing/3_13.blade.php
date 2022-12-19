<p>
    {{ __('exercises/3_13.description.1') }}
    <code>make-cycle</code>
    {{ __('exercises/3_13.description.2') }}
    <code>last-pair</code>
    {{ __('exercises/3_13.description.3') }}
    <a title="3.12" href="{{ route('exercises.show', App\Models\Exercise::findByPath('3.12')) }}">3.12</a>
    :
</p>
<pre><code>(define (make-cycle x)
  (set-cdr! (last-pair x) x)
  x)</code></pre>
<p>
    {{ __('exercises/3_13.description.4') }}
    <code>z</code>
    {{ __('exercises/3_13.description.5') }}
</p>
<pre><code>(define z (make-cycle (list 'a 'b 'c)))</code></pre>
<p>
    {{ __('exercises/3_13.description.6') }}
    <code>(last-pair z)</code>
    ?
</p>
