<p>{{ __('exercises/2_32.description.1') }}
<code>(1 2 3)</code>
{{ __('exercises/2_32.description.2') }}
<code>(() (3) (2) (2 3) (1) (1 3) (1 2) (1 2 3))</code>
{{ __('exercises/2_32.description.3') }}
</p>
<pre><code>(define (subsets s)
  (if (null? s)
      (list nil)
      (let ((rest (subsets (cdr s))))
        (append rest (map &lt;??&gt; rest)))))
</code></pre>
