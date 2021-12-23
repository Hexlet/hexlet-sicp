<p>{{ __('exercises/5_48.description.1') }}
<code>compile-and-go</code>
{{ __('exercises/5_48.description.2') }}
<code>compile-and-run</code>
{{ __('exercises/5_48.description.3') }}
</p>
<pre><code>;;; EC-Eval input:
(compile-and-run
  '(define (factorial n)
    (if (= n 1)
        1
        (* (factorial (- n 1)) n))))

;;; EC-Eval value:
<i>ok</i>

;;; EC-Eval input:
(factorial 5)

;;; EC-Eval value:
<i>120</i>
</code></pre>
