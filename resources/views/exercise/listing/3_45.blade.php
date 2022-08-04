<p>{{ __('exercises/3_45.description.1') }}
<code>make-account-and-serializer</code>
{{ __('exercises/3_45.description.2') }}
<code>serialized-exchange</code>
{{ __('exercises/3_45.description.3') }}
<code>make-account</code>
{{ __('exercises/3_45.description.4') }}
</p>
<pre><code>(define (make-account-and-serializer balance)
  (define (withdraw amount)
    (if (>= balance amount)
        (begin (set! balance (- balance amount))
               balance)
        "Insufficient funds"))
  (define (deposit amount)
    (set! balance (+ balance amount))
    balance)
  (let ((balance-serializer (make-serializer)))
    (define (dispatch m)
      (cond ((eq? m 'withdraw) (balance-serializer withdraw))
            ((eq? m 'deposit) (balance-serializer deposit))
            ((eq? m 'balance) balance)
            ((eq? m 'serializer) balance-serializer)
            (else (error "Unknown request -- MAKE-ACCOUNT"
                         m))))
    dispatch))
</code></pre>
<p>{{ __('exercises/3_45.description.5') }}
<code>make-account</code>
{{ __('exercises/3_45.description.6') }}
</p>
<pre><code>(define (deposit account amount)
 ((account 'deposit) amount))
</code></pre>
<p>{{ __('exercises/3_45.description.7') }}
<code>serialized-exchange</code>
{{ __('exercises/3_45.description.8') }}
</p>
