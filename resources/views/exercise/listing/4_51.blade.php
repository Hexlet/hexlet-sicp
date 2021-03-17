<p>{{ __('exercises/4_51.description.1') }}</p>
<pre><code>(define count 0)
(let ((x (an-element-of '(a b c)))
      (y (an-element-of '(a b c))))
  (permanent-set! count (+ count 1))
  (require (not (eq? x y)))
  (list x y count))
;;; Starting a new problem
;;; Amb-Eval value:
<i>(a b 2)</i>
;;; Amb-Eval input:
try-again
;;; Amb-Eval value:
<i>(a c 3)</i>
</code></pre>
<p>{{ __('exercises/4_51.description.2') }}</p>
