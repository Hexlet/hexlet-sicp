<p>
    {{ __('exercises/3_11.description.1') }}
    <a href="{{ getChapterOriginLinkForNumber('3.2.3') }}">3.2.3</a>
    {{ __('exercises/3_11.description.2') }}
    <a href="{{ getChapterOriginLinkForNumber('3.1.1') }}">3.1.1</a>
    :
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
  (define (dispatch m)
    (cond ((eq? m 'withdraw) withdraw)
          ((eq? m 'deposit) deposit)
          (else (error "Unknown request -- MAKE-ACCOUNT"
                       m))))
  dispatch)</code></pre>
<p>
    {{ __('exercises/3_11.description.3') }}
</p>
<pre><code>(define acc (make-account 50))

((acc 'deposit) 40)
<i>90</i>

((acc 'withdraw) 60)
<i>30</i></code></pre>
<p>
    {{ __('exercises/3_11.description.4') }}
    <code>acc</code>
    {{ __('exercises/3_11.description.5') }}
</p>
<pre><code>(define acc2 (make-account 100))</code></pre>
<p>
    {{ __('exercises/3_11.description.6') }}
    <code>acc</code>
    {{ __('exercises/3_11.description.7') }}
    <code>acc2</code>
   ?
</p>
