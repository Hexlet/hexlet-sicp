<p>
    {{ __('exercises/3_3.description.1') }}
    <code>make-account</code>
    {{ __('exercises/3_3.description.2') }}
    <code>make-account</code>
    {{ __('exercises/3_3.description.3') }}
</p>
<pre><code>(define acc (make-account 100 'secret-password))</code></pre>
<p>
    {{ __('exercises/3_3.description.4') }}
</p>
<pre><code>((acc 'secret-password 'withdraw) 40)
<i>60</i>
((acc 'some-other-password 'deposit) 50)
<i>"Incorrect password"</i></code></pre>
