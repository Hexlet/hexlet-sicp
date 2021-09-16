<p>{{ __('exercises/2_43.description.1') }}<a href="{{ route('exercises.show', getExercise('2.42')) }}">2.42</a>
{{ __('exercises/2_43.description.2') }}
<code>queens</code>
{{ __('exercises/2_43.description.3') }}
<code>6 × 6</code>
{{ __('exercises/2_43.description.4') }}
<code>flatmap</code>
{{ __('exercises/2_43.description.5') }}
</p>
<pre><code>(flatmap
 (lambda (new-row)
   (map (lambda (rest-of-queens)
          (adjoin-position new-row k rest-of-queens))
        (queen-cols (- k 1))))
 (enumerate-interval 1 board-size))
</code></pre>
<p>{{ __('exercises/2_43.description.6') }}<a href="{{ route('exercises.show', getExercise('2.42')) }}">2.42</a>
{{ __('exercises/2_43.description.7') }}
<code>T</code>
{{ __('exercises/2_43.description.8') }}
</p>
