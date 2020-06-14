<p>{{ __('exercises/2_81.description.1') }}</p>
<pre><code>(define (scheme-number->scheme-number n) n)
(define (complex->complex z) z)
(put-coercion 'scheme-number 'scheme-number
              scheme-number->scheme-number)
(put-coercion 'complex 'complex complex->complex)
</code></pre>
<p>{{ __('exercises/2_81.description.2') }}</p>
<pre><code>(define (exp x y) (apply-generic 'exp x y))
</code></pre>
<p>{{ __('exercises/2_81.description.3') }}</p>
<p>{{ __('exercises/2_81.description.4') }}</p>
<pre><code>(put 'exp '(scheme-number scheme-number)
     (lambda (x y) (tag (expt x y)))) ; using primitive expt
</code></pre>
<p>{{ __('exercises/2_81.description.5') }}</p>
<p>{{ __('exercises/2_81.description.6') }}</p>
<p>{{ __('exercises/2_81.description.7') }}</p>
