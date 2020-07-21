<p>{{ __('exercises/4_53.description') }}</p>
<pre><code>(let ((pairs '()))
  (if-fail (let ((p (prime-sum-pair '(1 3 5 8) '(20 35 110))))
             (permanent-set! pairs (cons p pairs))
             (amb))
           pairs))
</code></pre>
