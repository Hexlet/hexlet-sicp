<p>{{ __('exercises/4_21.description.1') }}<a href="{{ route('exercises.show', getExercise('4.20')) }}">4.20</a>
{{ __('exercises/4_21.description.2') }}
<code>letrec</code>
{{ __('exercises/4_21.description.3') }}
<code>define</code>
{{ __('exercises/4_21.description.4') }}
<code>10</code>
{{ __('exercises/4_21.description.5') }}
</p>
<pre><code>((lambda (n)
   ((lambda (fact)
      (fact fact n))
    (lambda (ft k)
      (if (= k 1)
          1
          (* k (ft ft (- k 1)))))))
 10)</code></pre>
<p>{{ __('exercises/4_21.description.6') }}</p>
<p>{{ __('exercises/4_21.description.7') }}</p>
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
<p>{{ __('exercises/4_21.description.8') }}
<code>f</code>
{{ __('exercises/4_21.description.9') }}
<code>letrec</code>
{{ __('exercises/4_21.description.10') }}
</p>
<pre><code>(define (f x)
  ((lambda (even? odd?)
     (even? even? odd? x))
   (lambda (ev? od? n)
     (if (= n 0) true (od? ?? ?? ??)))
   (lambda (ev? od? n)
     (if (= n 0) false (ev? ?? ?? ??)))))</code></pre>
