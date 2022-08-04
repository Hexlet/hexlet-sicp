<p>{{ __('exercises/4_54.description.1') }}
<code>require</code>
{{ __('exercises/4_54.description.2') }}
<code>amb</code>
{{ __('exercises/4_54.description.3') }}
</p>
<pre><code>(define (require? exp) (tagged-list? exp 'require))

(define (require-predicate exp) (cadr exp))
</code></pre>
<p>{{ __('exercises/4_54.description.4') }}
<code>analyze</code>
{{ __('exercises/4_54.description.5') }}
</p>
<pre><code>((require? exp) (analyze-require exp))
</code></pre>
<p>{{ __('exercises/4_54.description.6') }}
<code>analyze-require</code>
{{ __('exercises/4_54.description.7') }}
<code>require</code>
{{ __('exercises/4_54.description.8') }}
<code>analyze-require</code>
{{ __('exercises/4_54.description.9') }}
</p>
<pre><code>(define (analyze-require exp)
  (let ((pproc (analyze (require-predicate exp))))
    (lambda (env succeed fail)
      (pproc env
             (lambda (pred-value fail2)
               (if &lt;??&gt;
                   &lt;??&gt;
                   (succeed 'ok fail2)))
             fail))))
</code></pre>
