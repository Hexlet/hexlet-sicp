<p>{{ __('exercises/4_27.description.1') }}</p>
<pre><code>(define count 0)
(define (id x)
  (set! count (+ count 1))
  x)</code></pre>
<p>{{ __('exercises/4_27.description.2') }}</p>
<pre><code>(define w (id (id 10)))
;;; L-Eval input:
count
;;; L-Eval value:
&lt;response&gt;
;;; L-Eval input:
w
;;; L-Eval value:
&lt;response&gt;
;;; L-Eval input:
count
;;; L-Eval value:
&lt;response&gt;</code></pre>
