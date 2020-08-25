<p>
    {{ __('exercises/3_35.description.1') }}
    <a title="3.34" href="{{ route('exercises.show', getExercise('3.34')) }}">3.34</a>
    {{ __('exercises/3_35.description.2') }}
</p>
<pre><code>(define (squarer a b)
  (define (process-new-value)
    (if (has-value? b)
        (if (< (get-value b) 0)
            (error "square less than 0 -- SQUARER" (get-value b))
            &lt;alternative1&gt;)
        &lt;alternative2&gt;))
  (define (process-forget-value) &lt;body1&gt;)
  (define (me request) &lt;body2&gt;)
  &lt;rest of definition&gt;
  me)
</code></pre>
