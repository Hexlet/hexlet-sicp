<p>{{ __('exercises/4_71.description.1') }}
<code>simple-query</code>
{{ __('exercises/4_71.description.2') }}
<code>disjoin</code>
{{ __('exercises/4_71.description.3') }}
<code>delay</code>
{{ __('exercises/4_71.description.4') }}
</p>
<pre><code>(define (simple-query query-pattern frame-stream)
  (stream-flatmap
   (lambda (frame)
     (stream-append (find-assertions query-pattern frame)
                    (apply-rules query-pattern frame)))
   frame-stream))

(define (disjoin disjuncts frame-stream)
  (if (empty-disjunction? disjuncts)
      the-empty-stream
      (interleave
       (qeval (first-disjunct disjuncts) frame-stream)
       (disjoin (rest-disjuncts disjuncts) frame-stream))))
</code></pre>
<p>{{ __('exercises/4_71.description.5') }}</p>
