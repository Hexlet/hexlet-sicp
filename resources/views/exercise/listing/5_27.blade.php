<p>{{ __('exercises/5_27.description.1') }}<a href="{{ route('exercises.show', getExercise('5.26')) }}">5.26</a>
{{ __('exercises/5_27.description.2') }}</p>
<pre><code>(define (factorial n)
  (if (= n 1)
      1
      (* (factorial (- n 1)) n)))
</code></pre>
<p>{{ __('exercises/5_27.description.3') }}</p>
<img class="img-fluid" src="{{ asset('img/exercises/5_27.gif') }}" alt="5.27">
<p>{{ __('exercises/5_27.description.4') }}</p>
