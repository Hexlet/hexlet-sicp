<p>{{ __('exercises/2_81.description.1') }}
<code>apply-generic</code>
{{ __('exercises/2_81.description.2') }}
<code>scheme-number->complex</code>
{{ __('exercises/2_81.description.3') }}
</p>
<pre><code>(define (scheme-number->scheme-number n) n)
(define (complex->complex z) z)
(put-coercion 'scheme-number 'scheme-number
              scheme-number->scheme-number)
(put-coercion 'complex 'complex complex->complex)
</code></pre>
<p>{{ __('exercises/2_81.description.4') }}
<code>apply-generic</code>
{{ __('exercises/2_81.description.5') }}
<code>scheme-number</code>
{{ __('exercises/2_81.description.6') }}
<code>complex</code>
{{ __('exercises/2_81.description.7') }}
</p>
<pre><code>(define (exp x y) (apply-generic 'exp x y))
</code></pre>
<p>{{ __('exercises/2_81.description.8') }}
<code>scheme-number</code>
{{ __('exercises/2_81.description.9') }}
</p>
<p>{{ __('exercises/2_81.description.10') }}
<code>scheme-number</code>
{{ __('exercises/2_81.description.11') }}
</p>
<pre><code>(put 'exp '(scheme-number scheme-number)
     (lambda (x y) (tag (expt x y)))) ; using primitive expt
</code></pre>
<p>{{ __('exercises/2_81.description.12') }}
<code>exp</code>
{{ __('exercises/2_81.description.13') }}
</p>
<p>{{ __('exercises/2_81.description.14') }}</p>
<p>{{ __('exercises/2_81.description.15') }}
<code>apply-generic</code>
{{ __('exercises/2_81.description.16') }}
</p>
