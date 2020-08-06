<p>
    {{ __('exercises/3_11.description1') }}
    <a href="{{ getChapterOriginLink('3.2.3') }}">3.2.3</a>
    {{ __('exercises/3_11.description2') }}
    <a href="{{ getChapterOriginLink('3.1.1') }}">3.1.1</a>
    {{ __('exercises/3_11.description3') }}
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
     {{ __('exercises/3_11.description4') }}
</p>
<pre><code>(define acc (make-account 50))

((acc 'deposit) 40)
90

((acc 'withdraw) 60)
30</code></pre>
<p>
    {{ __('exercises/3_11.description5') }}
    <code>acc</code>
    {{ __('exercises/3_11.description6') }}
</p>
<pre><code>(define acc2 (make-account 100))</code></pre>
<p>
    {{ __('exercises/3_11.description7') }}
    <code>acc</code>
    {{ __('exercises/3_11.description8') }}
    <code>acc2</code>
    {{ __('exercises/3_11.description9') }}
</p>
