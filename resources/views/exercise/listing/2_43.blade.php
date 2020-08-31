<p>{{ __('exercises/2_43.description.1') }}<a href="{{ route('exercises.show', getExercise('2.42')) }}">2.42</a>
{{ __('exercises/2_43.description.2') }}</p>
<pre><code>(flatmap
 (lambda (new-row)
   (map (lambda (rest-of-queens)
          (adjoin-position new-row k rest-of-queens))
        (queen-cols (- k 1))))
 (enumerate-interval 1 board-size))
</code></pre>
<p>{{ __('exercises/2_43.description.3') }}<a href="{{ route('exercises.show', getExercise('2.42')) }}">2.42</a>
{{ __('exercises/2_43.description.4') }}</p>
