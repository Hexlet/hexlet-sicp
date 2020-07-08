<p>{{ __('exercises/4_21.description.1') }}</p>
<pre><code>((lambda (n)
   ((lambda (fact)
      (fact fact n))
    (lambda (ft k)
      (if (= k 1)
          1
          (* k (ft ft (- k 1)))))))
 10)</code></pre>
<p>{{ __('exercises/4_21.description.2') }}</p>
<p>{{ __('exercises/4_21.description.3') }}</p>
<pre><code>(define (f x)
  (define (even? n)
    (if (= n 0)
        true
        (odd? (- n 1))))
  (define (odd? n)
    (if (= n 0)
        false
        (even? (- n 1))))
  (even? x))</code></pre>
<p>{{ __('exercises/4_21.description.4') }}</p>
<pre><code>(define (f x)
  ((lambda (even? odd?)
     (even? even? odd? x))
   (lambda (ev? od? n)
     (if (= n 0) true (od? ?? ?? ??)))
   (lambda (ev? od? n)
     (if (= n 0) false (ev? ?? ?? ??)))))</code></pre>
