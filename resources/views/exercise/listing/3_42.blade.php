<p>{{ __('exercises/3_42.description.1') }}
<code>withdraw</code>
{{ __('exercises/3_42.description.2') }}
<code>deposit</code>
{{ __('exercises/3_42.description.3') }}
<code>make-account</code>
{{ __('exercises/3_42.description.4') }}
<code>protected</code>
{{ __('exercises/3_42.description.5') }}
<code>dispatch</code>
{{ __('exercises/3_42.description.6') }}
</p>
<pre><code>(define (make-account balance)
  (define (withdraw amount)
    (if (>= balance amount)
        (begin (set! balance (- balance amount))
               balance)
        "Insufficient funds"))
  (define (deposit amount)
    (set! balance (+ balance amount))
    balance)
  (let ((protected (make-serializer)))
    (let ((protected-withdraw (protected withdraw))
          (protected-deposit (protected deposit)))
      (define (dispatch m)
        (cond ((eq? m 'withdraw) protected-withdraw)
              ((eq? m 'deposit) protected-deposit)
              ((eq? m 'balance) balance)
              (else (error "Unknown request -- MAKE-ACCOUNT"
                           m))))
      dispatch)))
</code></pre>
<p>{{ __('exercises/3_42.description.7') }}
<code>make-account</code>
{{ __('exercises/3_42.description.8') }}
</p>
