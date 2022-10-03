<p>
    {{ __('exercises/3_10.description.1') }}
    <code>make-withdraw</code>
    {{ __('exercises/3_10.description.2') }}
    <code>balance</code>
    {{ __('exercises/3_10.description.3') }}
    <code> make-withdraw</code>
    {{ __('exercises/3_10.description.4') }}
    <code>let</code>
    {{ __('exercises/3_10.description.5') }}
</p>
<pre><code>(define (make-withdraw initial-amount)
  (let ((balance initial-amount))
    (lambda (amount)
      (if (>= balance amount)
          (begin (set! balance (- balance amount))
                 balance)
          "Insufficient funds"))))</code></pre>
<p>
    {{ __('exercises/3_10.description.6') }}
    <a href="https://xuanji.appspot.com/isicp/1-3-hop.html#%_sec_1.3.2">1.3.2</a>
    {{ __('exercises/3_10.description.7') }}
    <code>let</code>
    {{ __('exercises/3_10.description.8') }}
</p>
<pre><code>(let ((&lt;var&gt; &lt;exp&gt;)) &lt;body&gt;)</code></pre>
<p>
     {{ __('exercises/3_10.description.9') }}
</p>
<pre><code>((lambda (&lt;var&gt;) &lt;body&gt;) &lt;exp&gt;)</code></pre>
<p>
    {{ __('exercises/3_10.description.10') }}
    <code>make-withdraw</code>
    {{ __('exercises/3_10.description.11') }}
</p>
<pre><code>(define W1 (make-withdraw 100))

(W1 50)

(define W2 (make-withdraw 100))</code></pre>
<p>
    {{ __('exercises/3_10.description.12') }}
    <code>make-withdraw</code>
    {{ __('exercises/3_10.description.13') }}
</p>
