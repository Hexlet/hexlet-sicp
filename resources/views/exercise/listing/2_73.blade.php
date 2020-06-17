<p>{{ __('exercises/2_73.description.1') }}</p>
<pre><code>(define (deriv exp var)
  (cond ((number? exp) 0)
        ((variable? exp) (if (same-variable? exp var) 1 0))
        ((sum? exp)
         (make-sum (deriv (addend exp) var)
                   (deriv (augend exp) var)))
        ((product? exp)
         (make-sum
           (make-product (multiplier exp)
                         (deriv (multiplicand exp) var))
           (make-product (deriv (multiplier exp) var)
                         (multiplicand exp))))
        &lt;more rules can be added here&gt;
        (else (error "unknown expression type -- DERIV" exp))))
</code></pre>
<p>{{ __('exercises/2_73.description.2') }}</p>
<pre><code>(define (deriv exp var)
   (cond ((number? exp) 0)
         ((variable? exp) (if (same-variable? exp var) 1 0))
         (else ((get 'deriv (operator exp)) (operands exp)
                                            var))))
(define (operator exp) (car exp))
(define (operands exp) (cdr exp))
</code></pre>
<p>{{ __('exercises/2_73.description.3') }}</p>
<p>{{ __('exercises/2_73.description.4') }}</p>
<p>{{ __('exercises/2_73.description.5') }}</p>
<p>{{ __('exercises/2_73.description.6') }}</p>
<pre><code>((get (operator exp) 'deriv) (operands exp) var)
</code></pre>
<p>{{ __('exercises/2_73.description.7') }}</p>
