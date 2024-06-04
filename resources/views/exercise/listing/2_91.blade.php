<p>{{ __('exercises/2_91.description.1') }}</p>
<img class="img-fluid" src="{{ Vite::asset("resources/assets/images/exercises/2_91.gif") }}" alt="2.91">
<p>{{ __('exercises/2_91.description.2') }}</p>
<p>{{ __('exercises/2_91.description.3') }}
<code>div-poly</code>
{{ __('exercises/2_91.description.4') }}
<code>add-poly</code>
{{ __('exercises/2_91.description.5') }}
<code>mul-poly</code>
{{ __('exercises/2_91.description.6') }}
<code>div-poly</code>
{{ __('exercises/2_91.description.7') }}
<code>div-terms</code>
{{ __('exercises/2_91.description.8') }}
<code>div-poly</code>
{{ __('exercises/2_91.description.9') }}
<code>div-terms</code>
{{ __('exercises/2_91.description.10') }}
<code>div-terms</code>
{{ __('exercises/2_91.description.11') }}
</p>
<p>{{ __('exercises/2_91.description.12') }}
<code>div-terms</code>
{{ __('exercises/2_91.description.13') }}
<code>div-poly</code>
{{ __('exercises/2_91.description.14') }}
<code>poly</code>
{{ __('exercises/2_91.description.15') }}
<code>poly</code>
{{ __('exercises/2_91.description.16') }}
<code>poly</code>
{{ __('exercises/2_91.description.17') }}
</p>
<pre><code>(define (div-terms L1 L2)
  (if (empty-termlist? L1)
      (list (the-empty-termlist) (the-empty-termlist))
      (let ((t1 (first-term L1))
            (t2 (first-term L2)))
        (if (> (order t2) (order t1))
            (list (the-empty-termlist) L1)
            (let ((new-c (div (coeff t1) (coeff t2)))
                  (new-o (- (order t1) (order t2))))
              (let ((rest-of-result
                     &lt;compute rest of result recursively&gt;
                     ))
                &lt;form complete result&gt;
                ))))))
</code></pre>
