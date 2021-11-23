<p>{{ __('exercises/4_52.description.1') }}
<code>if-fail</code>
{{ __('exercises/4_52.description.2') }}
<code>If-fail</code>
{{ __('exercises/4_52.description.3') }}
</p>
<pre><code>;;; Amb-Eval input:
(if-fail (let ((x (an-element-of '(1 3 5))))
           (require (even? x))
           x)
         'all-odd)
;;; Starting a new problem
;;; Amb-Eval value:
<i>all-odd</i>
;;; Amb-Eval input:
(if-fail (let ((x (an-element-of '(1 3 5 8))))
           (require (even? x))
           x)
         'all-odd)
;;; Starting a new problem
;;; Amb-Eval value:
<i>8</i>
</code></pre>
