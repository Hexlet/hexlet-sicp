<p>{{ __('exercises/2_19.description.1') }}
<code>first-denomination</code>
{{ __('exercises/2_19.description.2') }}
<code>count-change</code>
{{ __('exercises/2_19.description.3') }}
</p>
<p>{{ __('exercises/2_19.description.4') }}
<code>cc</code>
{{ __('exercises/2_19.description.5') }}
</p>
<pre><code>(define us-coins (list 50 25 10 5 1))

(define uk-coins (list 100 50 20 10 5 2 1 0.5))
</code></pre>
<p>{{ __('exercises/2_19.description.6') }}
<code>cc</code>
{{ __('exercises/2_19.description.7') }}
</p>
<pre><code>(cc 100 us-coins)
<i>292</i>
</code></pre>
<p>{{ __('exercises/2_19.description.8') }}
<code>cc</code>
{{ __('exercises/2_19.description.9') }}
</p>
<pre><code>(define (cc amount coin-values)
  (cond ((= amount 0) 1)
        ((or (< amount 0) (no-more? coin-values)) 0)
        (else
         (+ (cc amount
                (except-first-denomination coin-values))
            (cc (- amount
                   (first-denomination coin-values))
                coin-values)))))
</code></pre>
<p>{{ __('exercises/2_19.description.10') }}
<code>first-denomination</code>
{{ __('exercises/2_19.description.11') }}
<code>except-first-denomination</code>
{{ __('exercises/2_19.description.12') }}
<code>no-more?</code>
{{ __('exercises/2_19.description.13') }}
<code>coin-values</code>
{{ __('exercises/2_19.description.14') }}
<code>cc</code>
{{ __('exercises/2_19.description.15') }}
</p>
