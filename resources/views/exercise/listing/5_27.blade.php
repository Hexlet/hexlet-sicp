<p>{{ __('exercises/5_27.description.1') }}<a href="{{ route('exercises.show', App\Models\Exercise::findByPath('5.26')) }}">5.26</a>
{{ __('exercises/5_27.description.2') }}</p>
<pre><code>(define (factorial n)
  (if (= n 1)
      1
      (* (factorial (- n 1)) n)))
</code></pre>
<p>{{ __('exercises/5_27.description.3') }}
<code>n</code>
{{ __('exercises/5_27.description.4') }}
<code>n!</code>
{{ __('exercises/5_27.description.5') }}
<code>n ≥ 1</code>
{{ __('exercises/5_27.description.6') }}
<code>n</code>
{{ __('exercises/5_27.description.7') }}
</p>
<img class="img-fluid" src="{{ mix('images/exercises/5_27.gif') }}" alt="5.27">
<p>{{ __('exercises/5_27.description.8') }}</p>
