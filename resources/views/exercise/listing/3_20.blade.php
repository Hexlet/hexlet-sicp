<p>
    {{ __('exercises/3_20.description.1') }}
</p>
<pre><code>(define x (cons 1 2))
(define z (cons x x))
(set-car! (cdr z) 17)
(car x)
<i>17</i></code></pre>
<p>
    {{ __('exercises/3_20.description.2') }}
    <a title="3.11" href="{{ route('exercises.show', getExercise('3.11')) }}">3.11</a>.)
</p>
