<p>{{ __('exercises/3_39.description') }}</p>
<pre><code>(define x 10)

(define s (make-serializer))

(parallel-execute (lambda () (set! x ((s (lambda () (* x x))))))
                  (s (lambda () (set! x (+ x 1)))))
</code></pre>
