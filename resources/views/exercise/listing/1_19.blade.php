<p>{{ __('exercises/1_19.description.1') }}
<code>a</code>
{{ __('exercises/1_19.description.2') }}
<code>b</code>
{{ __('exercises/1_19.description.3') }}
<code>fib-iter</code>
{{ __('exercises/1_19.description.4') }}
<code>a ← a + b</code>
{{ __('exercises/1_19.description.5') }}
<code>b ← a</code>
{{ __('exercises/1_19.description.6') }}
<code>T</code>
{{ __('exercises/1_19.description.7') }}
<code>T</code>
{{ __('exercises/1_19.description.8') }}
<code>Fib(n + 1)</code>
{{ __('exercises/1_19.description.9') }}
<code>Fib(n)</code>
{{ __('exercises/1_19.description.10') }}
<code>Tⁿ</code>
{{ __('exercises/1_19.description.11') }}
<code>T</code>
{{ __('exercises/1_19.description.12') }}
<code>(1,0)</code>
{{ __('exercises/1_19.description.13') }}
<code>T</code>
{{ __('exercises/1_19.description.14') }}
<code>p = 0</code>
{{ __('exercises/1_19.description.15') }}
<code>q = 1</code>
{{ __('exercises/1_19.description.16') }}
<code>Tpq</code>
{{ __('exercises/1_19.description.17') }}
<code>Tpq</code>
{{ __('exercises/1_19.description.18') }}
<code>(a,b)</code>
{{ __('exercises/1_19.description.19') }}
<code>a ← bq + aq + ap, b ← bp + aq</code>
{{ __('exercises/1_19.description.20') }}
<code>Tpq</code>
{{ __('exercises/1_19.description.21') }}
<code>Tp′q′</code>
{{ __('exercises/1_19.description.22') }}
<code>p′</code>
{{ __('exercises/1_19.description.23') }}
<code>q′</code>
{{ __('exercises/1_19.description.24') }}
<code>p</code>
{{ __('exercises/1_19.description.25') }}
<code>q</code>
{{ __('exercises/1_19.description.26') }}
<code>Tⁿ</code>
{{ __('exercises/1_19.description.27') }}
<code>fast-expt</code>
{{ __('exercises/1_19.description.28') }}
</p>
<pre><code>(define (fib n)
  (fib-iter 1 0 0 1 n))
(define (fib-iter a b p q count)
  (cond ((= count 0) b)
        ((even? count)
         (fib-iter a
                   b
                   &lt;??&gt;      ; compute p'
                   &lt;??&gt;      ; compute q'
                   (/ count 2)))
        (else (fib-iter (+ (* b q) (* a q) (* a p))
                        (+ (* b p) (* a q))
                        p
                        q
                        (- count 1)))))
</code></pre>
