<p>{{ __('exercises/4_8.description.1') }}
<code>let</code>
{{ __('exercises/4_8.description.2') }}
</p>
<pre><code>(let var bindings body)</code></pre>
<p>{{ __('exercises/4_8.description.3') }}
<code>&lt;bindings&gt;</code>
{{ __('exercises/4_8.description.4') }}
<code>&lt;body&gt;</code>
{{ __('exercises/4_8.description.5') }}
<code>let</code>
{{ __('exercises/4_8.description.6') }}
<code>&lt;var&gt;</code>
{{ __('exercises/4_8.description.7') }}
<code>&lt;body&gt;</code>
{{ __('exercises/4_8.description.8') }}
<code>&lt;body&gt;</code>
{{ __('exercises/4_8.description.9') }}
<code>&lt;bindings&gt;</code>
{{ __('exercises/4_8.description.10') }}
<code>&lt;body&gt;</code>
{{ __('exercises/4_8.description.11') }}
<code>&lt;var&gt;</code>
{{ __('exercises/4_8.description.12') }}
<code>let</code>
{{ __('exercises/4_8.description.13') }}
</p>
<pre><code>(define (fib n)
  (let fib-iter ((a 1)
                 (b 0)
                 (count n))
    (if (= count 0)
        b
        (fib-iter (+ a b) a (- count 1)))))</code></pre>
<p>{{ __('exercises/4_8.description.14') }}
<code>let->combination</code>
{{ __('exercises/4_8.description.15') }}
<a href="{{ route('exercises.show', App\Models\Exercise::findByPath('4.6')) }}">4.6</a>
{{ __('exercises/4_8.description.16') }}
<code>let</code>
{{ __('exercises/4_8.description.17') }}
</p>
