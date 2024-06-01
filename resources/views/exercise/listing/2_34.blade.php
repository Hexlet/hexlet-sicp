<p>{{ __('exercises/2_34.description.1') }}
<code>x</code>
{{ __('exercises/2_34.description.2') }}
<code>x</code>
{{ __('exercises/2_34.description.3') }}
</p>
<img class="img-fluid" src="{{ asset('build/images/exercises/2_34_1.gif') }}" alt="2.34.1">
<p>{{ __('exercises/2_34.description.4') }}</p>
<img class="img-fluid" src="{{ asset('build/images/exercises/2_34_2.gif') }}" alt="2.34.2">
<p>{{ __('exercises/2_34.description.5') }}
<code>aₙ</code>
{{ __('exercises/2_34.description.6') }}
<code>x</code>
{{ __('exercises/2_34.description.7') }}
<code>a₀</code>
{{ __('exercises/2_34.description.8') }}
<code>a₀</code>
{{ __('exercises/2_34.description.9') }}
<code>aₙ</code>
{{ __('exercises/2_34.description.10') }}
</p>
<pre><code>(define (horner-eval x coefficient-sequence)
  (accumulate (lambda (this-coeff higher-terms) &lt;??&gt;)
              0
              coefficient-sequence))
</code></pre>
<p>{{ __('exercises/2_34.description.11') }}
<code>1 + 3x + 5x³ + x⁵</code>
{{ __('exercises/2_34.description.12') }}
<code>x = 2</code>
{{ __('exercises/2_34.description.13') }}
</p>
<pre><code>(horner-eval 2 (list 1 3 0 5 0 1))
</code></pre>
