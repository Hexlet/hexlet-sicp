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
response
;;; L-Eval input:
w
;;; L-Eval value:
response
;;; L-Eval input:
count
;;; L-Eval value:
response</code></pre>
