<p>{{ __('exercises/4_20.description.1') }}
<code>letrec</code>
{{ __('exercises/4_20.description.2') }}
<code>Letrec</code>
{{ __('exercises/4_20.description.3') }}
<code>let</code>
{{ __('exercises/4_20.description.4') }}
<code>f</code>
{{ __('exercises/4_20.description.5') }}
</p>
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
    &lt;rest of body of f&gt;))</code></pre>
<p>{{ __('exercises/4_20.description.6') }}
<code>letrec</code>
{{ __('exercises/4_20.description.7') }}
</p>
<pre><code>(letrec ((&lt;var1&gt; &lt;exp1&gt;) ... (&lt;varn&gt; &lt;expn&gt;))
  body)</code></pre>
<p>{{ __('exercises/4_20.description.8') }}
<code>let</code>
{{ __('exercises/4_20.description.9') }}
<code>&lt;expk&gt;</code>
{{ __('exercises/4_20.description.10') }}
<code>&lt;vark&gt;</code>
{{ __('exercises/4_20.description.11') }}
<code>letrec</code>
{{ __('exercises/4_20.description.12') }}
<code>even?</code>
{{ __('exercises/4_20.description.13') }}
<code>odd?</code>
{{ __('exercises/4_20.description.14') }}
<code>10</code>
{{ __('exercises/4_20.description.15') }}
</p>
<pre><code>(letrec ((fact
          (lambda (n)
            (if (= n 1)
                1
                (* n (fact (- n 1)))))))
  (fact 10))</code></pre>
<p>{{ __('exercises/4_20.description.16') }}
<code>letrec</code>
{{ __('exercises/4_20.description.17') }}
<code>letrec</code>
{{ __('exercises/4_20.description.18') }}
<code>let</code>
{{ __('exercises/4_20.description.19') }}
<a href="{{ route('exercises.show', App\Models\Exercise::findByPath('4.18')) }}">4.18</a>
{{ __('exercises/4_20.description.20') }}
<code>letrec</code>
{{ __('exercises/4_20.description.21') }}
<code>let</code>
{{ __('exercises/4_20.description.22') }}
<code>set!</code>
{{ __('exercises/4_20.description.23') }}
</p>
<p>{{ __('exercises/4_20.description.24') }}
<code>define</code>
{{ __('exercises/4_20.description.25') }}
<code>let</code>
{{ __('exercises/4_20.description.26') }}
<code>&lt;rest of body of f&gt;</code>
{{ __('exercises/4_20.description.27') }}
<code>(f 5)</code>
{{ __('exercises/4_20.description.28') }}
<code>f</code>
{{ __('exercises/4_20.description.29') }}
<code>let</code>
{{ __('exercises/4_20.description.30') }}
<code>letrec</code>
{{ __('exercises/4_20.description.31') }}
<code>f</code>
{{ __('exercises/4_20.description.32') }}
</p>
