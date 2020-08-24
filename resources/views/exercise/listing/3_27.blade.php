<p>
    {{ __('exercises/3_27.description.1') }}
    <a href="{{ getChapterOriginLinkForNumber('1.2.2') }}">1.2.2</a>
    {{ __('exercises/3_27.description.2') }}
</p>
<pre><code>(define (fib n)
  (cond ((= n 0) 0)
        ((= n 1) 1)
        (else (+ (fib (- n 1))
                 (fib (- n 2))))))
</code></pre>
<p>{{ __('exercises/3_27.description.3') }}</p>
<pre><code>(define memo-fib
  (memoize (lambda (n)
             (cond ((= n 0) 0)
                   ((= n 1) 1)
                   (else (+ (memo-fib (- n 1))
                            (memo-fib (- n 2))))))))
</code></pre>
<p>
    {{ __('exercises/3_27.description.4') }}
    <code>memoize</code>
    {{ __('exercises/3_27.description.5') }}

</p>
<pre><code>(define (memoize f)
  (let ((table (make-table)))
    (lambda (x)
      (let ((previously-computed-result (lookup x table)))
        (or previously-computed-result
            (let ((result (f x)))
              (insert! x result table)
              result))))))
</code></pre>
<p>
    {{ __('exercises/3_27.description.6') }}
    <code>memo-fib 3</code>
    {{ __('exercises/3_27.description.7') }}
    <code>memo-fib</code>
    {{ __('exercises/3_27.description.8') }}
    <code>n</code>{{ __('exercises/3_27.description.9') }}
    <code>n</code>
    {{ __('exercises/3_27.description.10') }}
    <code>memo-fib</code>
    {{ __('exercises/3_27.description.11') }}
    <code>memoize fib</code>
    {{ __('exercises/3_27.description.12') }}
</p>
