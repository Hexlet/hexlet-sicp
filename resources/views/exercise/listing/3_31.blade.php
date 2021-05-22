<p>
    {{ __('exercises/3_31.description.1') }}
    <code>accept-action-procedure!</code>{{ __('exercises/3_31.description.2') }}
    <code>make-wire</code>{{ __('exercises/3_31.description.3') }}
    <code>half-adder</code>
    {{ __('exercises/3_31.description.4') }}
    <code>accept-action-procedure!</code>
    {{ __('exercises/3_31.description.5') }}
</p>
<pre><code>(define (accept-action-procedure! proc)
  (set! action-procedures (cons proc action-procedures)))
</code></pre>
