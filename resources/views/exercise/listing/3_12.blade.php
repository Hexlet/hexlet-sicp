<p>
    {{ __('exercises/3_12.description.1') }}
    <a href="{{ getChapterOriginLinkForNumber('2.2.1') }}">2.2.1</a>
    {{ __('exercises/3_12.description.2') }}
</p>
<pre><code>(define (append x y)
  (if (null? x)
      y
      (cons (car x) (append (cdr x) y))))</code></pre>
<p>
    <code>Append</code>
    {{ __('exercises/3_12.description.3') }}
    <code>x</code>
    {{ __('exercises/3_12.description.4') }}
    <code>y</code>
    {{ __('exercises/3_12.description.5') }}
    <code>append!</code>
    {{ __('exercises/3_12.description.6') }}
    <code>append</code>
    {{ __('exercises/3_12.description.7') }}
    <code>x</code>
    {{ __('exercises/3_12.description.8') }}
    <code>cdr</code>
    {{ __('exercises/3_12.description.9') }}
    <code>y</code>
    {{ __('exercises/3_12.description.10') }}
    <code> append!</code>
    {{ __('exercises/3_12.description.11') }}
    <code>x</code>
    {{ __('exercises/3_12.description.12') }}
</p>
<pre><code>(define (append! x y)
  (set-cdr! (last-pair x) y)
  x)</code></pre>
<p>
    {{ __('exercises/3_12.description.13') }}
    <code>last-pair</code>
    {{ __('exercises/3_12.description.14') }}
</p>
<pre><code>(define (last-pair x)
  (if (null? (cdr x))
      x
      (last-pair (cdr x))))</code></pre>
<p>
    {{ __('exercises/3_12.description.15') }}
</p>
<pre><code>(define x (list 'a 'b))
(define y (list 'c 'd))
(define z (append x y))
z
(a b c d)
(cdr x)
&lt;{{ __('exercises/3_12.description.18') }}&gt;
(define w (append! x y))
w
(a b c d)
(cdr x)
&lt;{{ __('exercises/3_12.description.18') }}&gt;</code></pre>
<p>
    {{ __('exercises/3_12.description.16') }}
    <code>&lt;{{ __('exercises/3_12.description.19') }}&gt;</code>
    {{ __('exercises/3_12.description.17') }}
</p>
