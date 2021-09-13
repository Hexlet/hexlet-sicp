<p>{{ __('exercises/2_39.description.1') }}
<code>reverse</code>
{{ __('exercises/2_39.description.2') }}
<a href="{{ route('exercises.show', getExercise('2.18')) }}">2.18</a>
{{ __('exercises/2_39.description.3') }}
<code>fold-right</code>
{{ __('exercises/2_39.description.4') }}
<code>fold-left</code>
{{ __('exercises/2_39.description.5') }}
<a href="{{ route('exercises.show', getExercise('2.38')) }}">2.38</a>
{{ __('exercises/2_39.description.6') }}</p>
<pre><code>(define (reverse-right sequence)
  (fold-right (lambda (x y) &lt;??&gt;) nil sequence))

(define (reverse-left sequence)
  (fold-left (lambda (x y) &lt;??&gt;) nil sequence))
</code></pre>
