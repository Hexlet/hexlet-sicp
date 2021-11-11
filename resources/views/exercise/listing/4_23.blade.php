<p>{{ __('exercises/4_23.description.1') }}
<code>analyze-sequence</code>
{{ __('exercises/4_23.description.2') }}
<code>eval</code>
{{ __('exercises/4_23.description.3') }}
<code>analyze-sequence</code>
{{ __('exercises/4_23.description.4') }}
</p>
<pre><code>(define (analyze-sequence exps)
  (define (execute-sequence procs env)
    (cond ((null? (cdr procs)) ((car procs) env))
          (else ((car procs) env)
                (execute-sequence (cdr procs) env))))
  (let ((procs (map analyze exps)))
    (if (null? procs)
        (error "Empty sequence -- ANALYZE"))
    (lambda (env) (execute-sequence procs env))))</code></pre>
<p>{{ __('exercises/4_23.description.5') }}</p>
<p>{{ __('exercises/4_23.description.6') }}
<code>analyze-sequence</code>
{{ __('exercises/4_23.description.7') }}
</p>
