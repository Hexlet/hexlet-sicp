<p>
    {{ __('exercises/3_12.description1') }}
    <a href="{{ getChapterOriginLinkForStr('2.2.1') }}">2.2.1</a>
    {{ __('exercises/3_12.description2') }}
</p>
<pre><code>(define (append x y)
  (if (null? x)
      y
      (cons (car x) (append (cdr x) y))))</code></pre>
<p>
    <code>Append</code>
    {{ __('exercises/3_12.description3') }}
    <code>x</code>
    {{ __('exercises/3_12.description4') }}
    <code>y</code>
    {{ __('exercises/3_12.description5') }}
    <code>append!</code>
    {{ __('exercises/3_12.description6') }}
    <code>append</code>
    {{ __('exercises/3_12.description7') }}
    <code>x</code>
    {{ __('exercises/3_12.description8') }}
    <code>cdr</code>
    {{ __('exercises/3_12.description9') }}
    <code>y</code>
    {{ __('exercises/3_12.description10') }}
    <code> append!</code>
    {{ __('exercises/3_12.description11') }}
    <code>x</code>
    {{ __('exercises/3_12.description12') }}
</p>
<pre><code>(define (append! x y)
  (set-cdr! (last-pair x) y)
  x)</code></pre>
<p>
    {{ __('exercises/3_12.description13') }}
    <code>last-pair</code>
    {{ __('exercises/3_12.description14') }}
</p>
<pre><code>(define (last-pair x)
  (if (null? (cdr x))
      x
      (last-pair (cdr x))))</code></pre>
<p>
    {{ __('exercises/3_12.description15') }}
</p>
<pre><code>(define x (list 'a 'b))
(define y (list 'c 'd))
(define z (append x y))
z
(a b c d)
(cdr x)
&lt;{{ __('exercises/3_12.description18') }}&gt;
(define w (append! x y))
w
(a b c d)
(cdr x)
&lt;{{ __('exercises/3_12.description18') }}&gt;</code></pre>
<p>
    {{ __('exercises/3_12.description16') }}
    <code>&lt;{{ __('exercises/3_12.description19') }}&gt;</code>
    {{ __('exercises/3_12.description17') }}
</p>
