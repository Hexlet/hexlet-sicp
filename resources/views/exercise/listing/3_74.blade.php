<p>{{ __('exercises/3_74.description.1') }}
<code>+1</code>
{{ __('exercises/3_74.description.2') }}
<code>-1</code>
{{ __('exercises/3_74.description.3') }}
<code>0</code>
{{ __('exercises/3_74.description.4') }}
</p>
<pre><code>...1  2  1.5  1  0.5  -0.1  -2  -3  -2  -0.5  0.2  3  4 ...
...0  0   0   0    0    -1   0   0   0    0    1   0  0 ...
</code></pre>
<p>{{ __('exercises/3_74.description.5') }}
<code>sense-data</code>
{{ __('exercises/3_74.description.6') }}
<code>zero-crossings</code>
{{ __('exercises/3_74.description.7') }}
<code>sign-change-detector</code>
{{ __('exercises/3_74.description.8') }}
<code>0</code>
{{ __('exercises/3_74.description.9') }}
<code>1</code>
{{ __('exercises/3_74.description.10') }}
<code>-1</code>
{{ __('exercises/3_74.description.11') }}
</p>
<pre><code>(define (make-zero-crossings input-stream last-value)
  (cons-stream
   (sign-change-detector (stream-car input-stream) last-value)
   (make-zero-crossings (stream-cdr input-stream)
                        (stream-car input-stream))))

(define zero-crossings (make-zero-crossings sense-data 0))
</code></pre>
<p>{{ __('exercises/3_74.description.12') }}
<code>stream-map</code>
{{ __('exercises/3_74.description.13') }}
<a href="{{ route('exercises.show', App\Models\Exercise::findByPath('3.50')) }}">3.50</a>
{{ __('exercises/3_74.description.14') }}</p>
<pre><code>(define zero-crossings
  (stream-map sign-change-detector sense-data &lt;expression&gt;))
</code></pre>
<p>{{ __('exercises/3_74.description.15') }}
<code>&lt;expression&gt;</code>
{{ __('exercises/3_74.description.16') }}
</p>
