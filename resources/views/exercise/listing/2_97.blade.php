<p>{{ __('exercises/2_97.description.1') }}</p>
<p>{{ __('exercises/2_97.description.2') }}</p>
<pre><code>
(define (reduce-integers n d)
  (let ((g (gcd n d)))
    (list (/ n g) (/ d g))))
</code></pre>
<p>{{ __('exercises/2_97.description.3') }}</p>
<pre><code>
(define p1 (make-polynomial 'x '((1 1)(0 1))))
(define p2 (make-polynomial 'x '((3 1)(0 -1))))
(define p3 (make-polynomial 'x '((1 1))))
(define p4 (make-polynomial 'x '((2 1)(0 -1))))

(define rf1 (make-rational p1 p2))
(define rf2 (make-rational p3 p4))

(add rf1 rf2)
</code></pre>
<p>{{ __('exercises/2_97.description.4') }}</p>
<p>{{ __('exercises/2_97.description.5') }}</p>
