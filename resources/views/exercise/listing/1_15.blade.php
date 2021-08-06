<p>{{ __('exercises/1_15.description.1') }}
<code>sin x ≈ x</code>
{{ __('exercises/1_15.description.2') }}
<code>x</code>
{{ __('exercises/1_15.description.3') }}
</p>
<pre><code>sin(x) = 3sin(x / 3) − 4sin³(x / 3)</code></pre>
<p>{{ __('exercises/1_15.description.4') }}
<code>sin</code>
{{ __('exercises/1_15.description.5') }}
</p>
<pre><code>(define (cube x) (* x x x))

(define (p x) (- (* 3 x) (* 4 (cube x))))

(define (sine angle)
   (if (not (> (abs angle) 0.1))
       angle
       (p (sine (/ angle 3.0)))))</code></pre>
<p>{{ __('exercises/1_15.description.6') }}
<code>p</code>
{{ __('exercises/1_15.description.7') }}
<code>(sine 12.15)</code>
{{ __('exercises/1_15.description.8') }}
</p>
<p>{{ __('exercises/1_15.description.9') }}
<code>a</code>
{{ __('exercises/1_15.description.10') }}
<code>sine</code>
{{ __('exercises/1_15.description.11') }}
<code>(sine a)</code>
{{ __('exercises/1_15.description.12') }}
</p>
