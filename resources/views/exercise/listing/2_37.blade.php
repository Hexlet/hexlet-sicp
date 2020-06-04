<p>{{ __('exercises/2_37.description.1') }}</p>
<img class="img-fluid" src="{{ asset('img/exercises/2_37.gif') }}" alt="2.37">
<p>{{ __('exercises/2_37.description.2') }}</p>
<p>{{ __('exercises/2_37.description.3') }}</p>
<p>{{ __('exercises/2_37.description.4') }}</p>
<p>{{ __('exercises/2_37.description.5') }}</p>
<p>{{ __('exercises/2_37.description.6') }}</p>
<p>{{ __('exercises/2_37.description.7') }}</p>
<pre><code>(define (dot-product v w)
  (accumulate + 0 (map * v w)))
</code></pre>
<p>{{ __('exercises/2_37.description.8') }}</p>
<pre><code>(define (matrix-*-vector m v)
  (map &lt;??&gt; m))
(define (transpose mat)
  (accumulate-n &lt;??&gt; &lt;??&gt; mat))
(define (matrix-*-matrix m n)
  (let ((cols (transpose n)))
    (map &lt;??&gt; m)))
</code></pre>
