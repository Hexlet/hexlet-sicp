<p>{{ __('exercises/4_20.description.1') }}</p>
<pre><code>(define (f x)
  (letrec ((even?
            (lambda (n)
              (if (= n 0)
                  true
                  (odd? (- n 1)))))
           (odd?
            (lambda (n)
              (if (= n 0)
                  false
                  (even? (- n 1))))))
    rest of body of f))</code></pre>
<p>{{ __('exercises/4_20.description.2') }}</p>
<pre><code>(letrec ((var1 exp1) ... (varn expn))
  body)</code></pre>
<p>{{ __('exercises/4_20.description.3') }}</p>
<pre><code>(letrec ((fact
          (lambda (n)
            (if (= n 1)
                1
                (* n (fact (- n 1)))))))
  (fact 10))</code></pre>
<p>{{ __('exercises/4_20.description.4') }}<a href="{{ route('exercises.show', getExercise('4.18')) }}">4.18</a>
{{ __('exercises/4_20.description.5') }}</p>
<p>{{ __('exercises/4_20.description.6') }}</p>
