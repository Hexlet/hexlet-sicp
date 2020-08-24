<p>
    {{ __('exercises/3_14.description.1') }}
</p>
<pre><code>(define (mystery x)
  (define (loop x y)
    (if (null? x)
        y
        (let ((temp (cdr x)))
          (set-cdr! x y)
          (loop temp x))))
  (loop x '()))</code></pre>
<p>
    <code>Loop</code>
    {{ __('exercises/3_14.description.2') }}
    <code>temp</code>
    {{ __('exercises/3_14.description.3') }}
    <code>cdr</code>
    {{ __('exercises/3_14.description.4') }}
    <code>x</code>
    {{ __('exercises/3_14.description.5') }}
    <code>set-cd!</code>
    {{ __('exercises/3_14.description.6') }}
    <code>cdr</code>
    {{ __('exercises/3_14.description.7') }}
    <code>mystery</code>
    {{ __('exercises/3_14.description.8') }}
    <code>v</code>
    {{ __('exercises/3_14.description.9') }}
    <code>(define v (list 'a 'b 'c 'd))</code>
    {{ __('exercises/3_14.description.10') }}
    <code>v</code>
    {{ __('exercises/3_14.description.11') }}
    <code>(define w (mystery v))</code>
    {{ __('exercises/3_14.description.12') }}
    <code>v</code>
    {{ __('exercises/3_14.description.13') }}
    <code>w</code>
    {{ __('exercises/3_14.description.14') }}
    <code>v</code>
    {{ __('exercises/3_14.description.15') }}
    <code>w</code>
    ?
</p>
