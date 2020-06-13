<p>
    {{ __('exercises/3_14.description1') }}
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
    {{ __('exercises/3_14.description2') }}
    <code>temp</code>
    {{ __('exercises/3_14.description3') }}
    <code>cdr</code>
    {{ __('exercises/3_14.description4') }}
    <code>x</code>
    {{ __('exercises/3_14.description5') }}
    <code>set-cd!</code>
    {{ __('exercises/3_14.description6') }}
    <code>cdr</code>
    {{ __('exercises/3_14.description7') }}
    <code>mystery</code>
    {{ __('exercises/3_14.description8') }}
    <code>v</code>
    {{ __('exercises/3_14.description9') }}
    <code>(define v (list 'a 'b 'c 'd))</code>
    {{ __('exercises/3_14.description10') }}
    <code>v</code>
    {{ __('exercises/3_14.description11') }}
    <code>(define w (mystery v))</code>
    {{ __('exercises/3_14.description12') }}
    <code>v</code>
    {{ __('exercises/3_14.description13') }}
    <code>w</code>
    {{ __('exercises/3_14.description14') }}
    <code>v</code>
    {{ __('exercises/3_14.description15') }}
    <code>w</code>
    {{ __('exercises/3_14.description16') }}
</p>
