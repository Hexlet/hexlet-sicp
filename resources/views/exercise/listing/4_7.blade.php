<p>{{ __('exercises/4_7.description.1') }}
<code>let*</code>
{{ __('exercises/4_7.description.2') }}
<code>let</code>
{{ __('exercises/4_7.description.3') }}
<code>let*</code>
{{ __('exercises/4_7.description.4') }}
</p>
<pre><code>(let* ((x 3)
      (y (+ x 2))
      (z (+ x y 5)))
  (* x z))</code></pre>
<p>{{ __('exercises/4_7.description.5') }}
<code>39</code>
{{ __('exercises/4_7.description.6') }}
<code>let*</code>
{{ __('exercises/4_7.description.7') }}
<code>let</code>
{{ __('exercises/4_7.description.8') }}
<code>let*->nested-lets</code>
{{ __('exercises/4_7.description.9') }}
<code>let</code>
{{ __('exercises/4_7.description.10') }}
<a href="{{ route('exercises.show', App\Models\Exercise::findByPath('4.6')) }}">4.6</a>
{{ __('exercises/4_7.description.11') }}
<code>let*</code>
{{ __('exercises/4_7.description.12') }}
<code>eval</code>
{{ __('exercises/4_7.description.13') }}
</p>
<pre><code>(eval (let*->nested-lets exp) env)</code></pre>
<p>{{ __('exercises/4_7.description.14') }}
<code>let*</code>
{{ __('exercises/4_7.description.15') }}
</p>
