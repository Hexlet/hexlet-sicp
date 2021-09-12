<p>{{ __('exercises/2_38.description.1') }}
<code>fold-right</code>
{{ __('exercises/2_38.description.2') }}
<code>fold-left</code>
{{ __('exercises/2_38.description.3') }}
<code>fold-right</code>
{{ __('exercises/2_38.description.4') }}
</p>
<pre><code>(define (fold-left op initial sequence)
  (define (iter result rest)
    (if (null? rest)
        result
        (iter (op result (car rest))
              (cdr rest))))
  (iter initial sequence))
</code></pre>
<p>{{ __('exercises/2_38.description.5') }}</p>
<pre><code>(fold-right / 1 (list 1 2 3))

(fold-left / 1 (list 1 2 3))

(fold-right list nil (list 1 2 3))

(fold-left list nil (list 1 2 3))
</code></pre>
<p>{{ __('exercises/2_38.description.6') }}
<code>op</code>
{{ __('exercises/2_38.description.7') }}
<code>fold-right</code>
{{ __('exercises/2_38.description.8') }}
<code>fold-left</code>
{{ __('exercises/2_38.description.9') }}
</p>
