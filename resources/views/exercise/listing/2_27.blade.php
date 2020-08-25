<p>{{ __('exercises/2_27.description.1') }}<a href="{{ route('exercises.show', getExercise('2.18')) }}">2.18</a>
{{ __('exercises/2_27.description.2') }}</p>
<pre><code>(define x (list (list 1 2) (list 3 4)))

x
((1 2) (3 4))

(reverse x)
((3 4) (1 2))

(deep-reverse x)
((4 3) (2 1))
</code></pre>
