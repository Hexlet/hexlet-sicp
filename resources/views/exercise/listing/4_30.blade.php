<p>{{ __('exercises/4_30.description.1') }}
<code>eval-sequence</code>
{{ __('exercises/4_30.description.2') }}
<code>actual-value</code>
{{ __('exercises/4_30.description.3') }}
<code>eval</code>
{{ __('exercises/4_30.description.4') }}
</p>
<pre><code>(define (eval-sequence exps env)
  (cond ((last-exp? exps) (eval (first-exp exps) env))
        (else (actual-value (first-exp exps) env)
              (eval-sequence (rest-exps exps) env))))</code></pre>
<p>{{ __('exercises/4_30.description.5') }}
<code>for-each</code>
{{ __('exercises/4_30.description.6') }}
<a href="{{ route('exercises.show', App\Models\Exercise::findByPath('2.23')) }}">2.23</a>
{{ __('exercises/4_30.description.7') }}</p>
<pre><code>(define (for-each proc items)
  (if (null? items)
      'done
      (begin (proc (car items))
             (for-each proc (cdr items)))))</code></pre>
<p>{{ __('exercises/4_30.description.8') }}
<code>eval-sequence</code>
{{ __('exercises/4_30.description.9') }}
</p>
<pre><code>;;; L-Eval input:
(for-each (lambda (x) (newline) (display x))
          (list 57 321 88))
<i>57</i>
<i>321</i>
<i>88</i>
;;; L-Eval value:
<i>done</i></code></pre>
<p>{{ __('exercises/4_30.description.10') }}
<code>for-each</code>
{{ __('exercises/4_30.description.11') }}
</p>
<p>{{ __('exercises/4_30.description.12') }}
<code>for-each</code>
{{ __('exercises/4_30.description.13') }}
<code>eval-sequence</code>
{{ __('exercises/4_30.description.14') }}
</p>
<pre><code>(define (p1 x)
  (set! x (cons x '(2)))
  x)

(define (p2 x)
  (define (p e)
    e
    x)
  (p (set! x (cons x '(2)))))</code></pre>
<p>{{ __('exercises/4_30.description.15') }}
<code>(p1 1)</code>
{{ __('exercises/4_30.description.16') }}
<code>(p2 1)</code>
{{ __('exercises/4_30.description.17') }}
<code>eval-sequence</code>
{{ __('exercises/4_30.description.18') }}
</p>
<p>{{ __('exercises/4_30.description.19') }}
<code>eval-sequence</code>
{{ __('exercises/4_30.description.20') }}
</p>
<p>{{ __('exercises/4_30.description.21') }}</p>
