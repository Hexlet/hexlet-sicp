<p>{{ __('exercises/2_32.description') }}</p>
<pre><code>(define (subsets s)
  (if (null? s)
      (list nil)
      (let ((rest (subsets (cdr s))))
        (append rest (map &lt;??&gt; rest)))))
</code></pre>
