<p>{{ __('exercises/3_59.description.1') }}</p>
<img class="img-fluid" src="{{ asset('images/exercises/3_59_1.gif') }}" alt="3.59_1">
<p>{{ __('exercises/3_59.description.2') }}
<code>a₀ + a₁x + a₂x² + a₃x³ + ···</code>
{{ __('exercises/3_59.description.3') }}
<code>a₀, a₁, a₂, a₃, ...</code>
{{ __('exercises/3_59.description.4') }}
</p>
<p>{{ __('exercises/3_59.description.5') }}
<code>a₀ + a₁x + a₂x² + a₃x³ + ···</code>
{{ __('exercises/3_59.description.6') }}
</p>
<img class="img-fluid" src="{{ asset('images/exercises/3_59_2.gif') }}" alt="3.59_2">
<p>{{ __('exercises/3_59.description.7') }}
<code>c</code>
{{ __('exercises/3_59.description.8') }}
<code>integrate-series</code>
{{ __('exercises/3_59.description.9') }}
<code>a₀, a₁, a₂, ...</code>
{{ __('exercises/3_59.description.10') }}
<code>a₀, (1/2)a₁, (1/3)a₂, ...</code>
{{ __('exercises/3_59.description.11') }}
<code>integrate-series</code>
{{ __('exercises/3_59.description.12') }}
<code>cons</code>
{{ __('exercises/3_59.description.13') }}
</p>
<p>{{ __('exercises/3_59.description.14') }}
<code>x → eˣ</code>
{{ __('exercises/3_59.description.15') }}
<code>eˣ</code>
{{ __('exercises/3_59.description.16') }}
<code>eˣ</code>
{{ __('exercises/3_59.description.17') }}
<code>e⁰ = 1</code>
{{ __('exercises/3_59.description.18') }}
<code>eˣ</code>
{{ __('exercises/3_59.description.19') }}
</p>
<pre><code>(define exp-series
  (cons-stream 1 (integrate-series exp-series)))
</code></pre>
<p>{{ __('exercises/3_59.description.20') }}</p>
<pre><code>(define cosine-series
  (cons-stream 1 &lt;??&gt;))
(define sine-series
  (cons-stream 0 &lt;??&gt;))
</code></pre>
