<p>
    {{ __('exercises/3_3.description1') }}
    <code>make-account</code>
    {{ __('exercises/3_3.description2') }}
    <code>make-account</code>
    {{ __('exercises/3_3.description3') }}
</p>
<pre><code>(define acc (make-account 100 'secret-password))</code></pre>
<p>
    {{ __('exercises/3_3.description4') }}
</p>
<pre><code>((acc 'secret-password 'withdraw) 40)
60
((acc 'some-other-password 'deposit) 50)
"Incorrect password"</code></pre>
