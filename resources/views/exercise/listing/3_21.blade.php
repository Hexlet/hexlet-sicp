<p>{{ __('exercises/3_21.description.1') }}</p>
<pre><code>(define q1 (make-queue))

(insert-queue! q1 'a)
<i>((a) a)</i>

(insert-queue! q1 'b)
<i>((a b) b)</i>

(delete-queue! q1)
<i>((b) b)</i>

(delete-queue! q1)
<i>(() b)</i>
</code></pre>
<p>
    {{ __('exercises/3_21.description.2') }}
    <code>print-queue</code>
    {{ __('exercises/3_21.description.3') }}
</p>
