<p>{{ __('exercises/3_21.description.1') }}</p>
<pre><code>(define q1 (make-queue))

(insert-queue! q1 'a)
((a) a)

(insert-queue! q1 'b)
((a b) b)

(delete-queue! q1)
((b) b)

(delete-queue! q1)
(() b)
</code></pre>
<p>{{ __('exercises/3_21.description.2') }}</p>
