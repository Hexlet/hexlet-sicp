<p>{{ __('exercises/2_38.description.1') }}</p>
<pre><code>(define (fold-left op initial sequence)
  (define (iter result rest)
    (if (null? rest)
        result
        (iter (op result (car rest))
              (cdr rest))))
  (iter initial sequence))
</code></pre>
<p>{{ __('exercises/2_38.description.2') }}</p>
<pre><code>(fold-right / 1 (list 1 2 3))

(fold-left / 1 (list 1 2 3))

(fold-right list nil (list 1 2 3))

(fold-left list nil (list 1 2 3))
</code></pre>
<p>{{ __('exercises/2_38.description.3') }}</p>
