<p>{{ __('exercises/2_27.description.1') }}
<code>reverse</code>
{{ __('exercises/2_27.description.2') }}
<a href="{{ route('exercises.show', getExercise('2.18')) }}">2.18</a>
{{ __('exercises/2_27.description.3') }}
<code>deep-reverse</code>
{{ __('exercises/2_27.description.4') }}
</p>
<pre><code>(define x (list (list 1 2) (list 3 4)))

x
<i>((1 2) (3 4))</i>

(reverse x)
<i>((3 4) (1 2))</i>

(deep-reverse x)
<i>((4 3) (2 1))</i>
</code></pre>
