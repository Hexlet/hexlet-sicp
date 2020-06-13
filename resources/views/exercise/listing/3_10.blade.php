<p>
    {{ __('exercises/3_10.description1') }}
    <code>make-withdraw</code>
    {{ __('exercises/3_10.description2') }}
    <code>balance</code>
    {{ __('exercises/3_10.description3') }}
    <code> make-withdraw</code>
    {{ __('exercises/3_10.description4') }}
    <code>let</code>
    {{ __('exercises/3_10.description5') }}
</p>
<pre><code>(define (make-withdraw initial-amount)
  (let ((balance initial-amount))
    (lambda (amount)
      (if (>= balance amount)
          (begin (set! balance (- balance amount))
                 balance)
          "Insufficient funds"))))</code></pre>
<p>
    {{ __('exercises/3_10.description6') }}
    <a href="https://mitpress.mit.edu/sites/default/files/sicp/full-text/book/book-Z-H-12.html#%_sec_1.3.2">1.3.2</a>
    {{ __('exercises/3_10.description7') }}
    <code>let</code>
    {{ __('exercises/3_10.description8') }}
</p>
<pre><code>(let ((&lt;var&gt; &lt;exp&gt;)) &lt;body&gt;)</code></pre>
<p>
     {{ __('exercises/3_10.description9') }}
</p>
<pre><code>((lambda (&lt;var&gt;) &lt;body&gt;) &lt;exp&gt;)</code></pre>
<p>
    {{ __('exercises/3_10.description10') }}
    <code>make-withdraw</code>
    {{ __('exercises/3_10.description11') }}
</p>
<pre><code>(define W1 (make-withdraw 100))

(W1 50)

(define W2 (make-withdraw 100))</code></pre>
<p>
    {{ __('exercises/3_10.description12') }}
    <code>make-withdraw</code>
    {{ __('exercises/3_10.description13') }}
</p>
