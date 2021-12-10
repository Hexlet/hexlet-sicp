<p>{{ __('exercises/5_26.description.1') }}
<code>factorial</code>
{{ __('exercises/5_26.description.2') }}
</p>
<pre><code>(define (factorial n)
  (define (iter product counter)
    (if (> counter n)
        product
        (iter (* counter product)
              (+ counter 1))))
  (iter 1 1))
</code></pre>
<p>{{ __('exercises/5_26.description.3') }}
<code>n</code>
{{ __('exercises/5_26.description.4') }}
<code>n!</code>
{{ __('exercises/5_26.description.5') }}
</p>
<p>{{ __('exercises/5_26.description.6') }}
<code>n!</code>
{{ __('exercises/5_26.description.7') }}
<code>n</code>
{{ __('exercises/5_26.description.8') }}
</p>
<p>{{ __('exercises/5_26.description.9') }}
<code>n</code>
{{ __('exercises/5_26.description.10') }}
<code>n!</code>
{{ __('exercises/5_26.description.11') }}
<code>n ≥ 1</code>
{{ __('exercises/5_26.description.12') }}
<code>n</code>
{{ __('exercises/5_26.description.13') }}
</p>
