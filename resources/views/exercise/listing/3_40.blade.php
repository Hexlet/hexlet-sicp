<p>{{ __('exercises/3_40.description.1') }}
<code>x</code>
{{ __('exercises/3_40.description.2') }}
</p>
<pre><code>(define x 10)

(parallel-execute (lambda () (set! x (* x x)))
                  (lambda () (set! x (* x x x))))
</code></pre>
<p>{{ __('exercises/3_40.description.3') }}</p>
<pre><code>(define x 10)

(define s (make-serializer))

(parallel-execute (s (lambda () (set! x (* x x))))
                  (s (lambda () (set! x (* x x x)))))
</code></pre>
