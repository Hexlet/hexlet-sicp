<p>{{ __('exercises/4_19.description.1') }}</p>
<pre><code>(let ((a 1))
  (define (f x)
    (define b (+ a x))
    (define a 5)
    (+ a b))
  (f 10))</code></pre>
<p>{{ __('exercises/4_19.description.2') }}
<code>define</code>
{{ __('exercises/4_19.description.3') }}
<code>b</code>
{{ __('exercises/4_19.description.4') }}
<code>11</code>
{{ __('exercises/4_19.description.5') }}
<code>a</code>
{{ __('exercises/4_19.description.6') }}
<code>5</code>
{{ __('exercises/4_19.description.7') }}
<code>16</code>
{{ __('exercises/4_19.description.8') }}
<a href="{{ route('exercises.show', App\Models\Exercise::findByPath('4.16')) }}">4.16</a>
{{ __('exercises/4_19.description.9') }}
<code>a</code>
{{ __('exercises/4_19.description.10') }}
<code>b</code>
{{ __('exercises/4_19.description.11') }}
<code>5</code>
{{ __('exercises/4_19.description.12') }}
<code>a</code>
{{ __('exercises/4_19.description.13') }}
<code>b</code>
{{ __('exercises/4_19.description.14') }}
<code>a</code>
{{ __('exercises/4_19.description.15') }}
<code>5</code>
{{ __('exercises/4_19.description.16') }}
<code>b</code>
{{ __('exercises/4_19.description.17') }}
<code>15</code>
{{ __('exercises/4_19.description.18') }}
<code>20</code>
{{ __('exercises/4_19.description.19') }}
</p>
