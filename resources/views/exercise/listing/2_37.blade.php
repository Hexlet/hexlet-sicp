<p>{{ __('exercises/2_37.description.1') }}
<code>v = (vᵢ)</code>
{{ __('exercises/2_37.description.2') }}
<code>m = (mᵢⱼ)</code>
{{ __('exercises/2_37.description.3') }}
</p>
<img class="img-fluid" src="{{ asset('build/images/exercises/2_37.gif') }}" alt="2.37">
<p>{{ __('exercises/2_37.description.4') }}
<code>((1 2 3 4) (4 5 6 6) (6 7 8 9))</code>
{{ __('exercises/2_37.description.5') }}
</p>
<p>
<code>(dot-product v w)</code>
{{ __('exercises/2_37.description.6') }}
<code>∑ᵢvᵢwᵢ</code>
</p>
<p>
<code>(matrix-*-vector m v)</code>
{{ __('exercises/2_37.description.7') }}
<code>t</code>
{{ __('exercises/2_37.description.8') }}
<code>tᵢ = ∑ⱼmᵢⱼvᵢ</code>
</p>
<p>
<code>(matrix-*-matrix m n)</code>
{{ __('exercises/2_37.description.9') }}
<code>p</code>
{{ __('exercises/2_37.description.10') }}
<code>pᵢⱼ = ∑ₖmᵢₖnₖⱼ</code>
</p>
<p>
<code>(transpose m)</code>
{{ __('exercises/2_37.description.11') }}
<code>n</code>
{{ __('exercises/2_37.description.12') }}
<code>nᵢⱼ = mⱼᵢ</code>
</p>
<p>{{ __('exercises/2_37.description.13') }}</p>
<pre><code>(define (dot-product v w)
  (accumulate + 0 (map * v w)))
</code></pre>
<p>{{ __('exercises/2_37.description.14') }}
<code>accumulate-n</code>
{{ __('exercises/2_37.description.15') }}
<a href="{{ route('exercises.show', App\Models\Exercise::findByPath('2.36')) }}">2.36</a>
{{ __('exercises/2_37.description.16') }}</p>
<pre><code>(define (matrix-*-vector m v)
  (map &lt;??&gt; m))
(define (transpose mat)
  (accumulate-n &lt;??&gt; &lt;??&gt; mat))
(define (matrix-*-matrix m n)
  (let ((cols (transpose n)))
    (map &lt;??&gt; m)))
</code></pre>
