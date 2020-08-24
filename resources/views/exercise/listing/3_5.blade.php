<p>
    {{ __('exercises/3_5.description.1') }}
    <code>P(x, y)</code>
    {{ __('exercises/3_5.description.2') }}
    <code>(x, y)</code>
    {{ __('exercises/3_5.description.3') }}
    <code>3</code>
    {{ __('exercises/3_5.description.4') }}
    <code>(5, 7)</code>
    {{ __('exercises/3_5.description.5') }}
    <code>(x - 5)&sup2; + (y - 7)&sup2; &le; 3&sup2;</code>
    {{ __('exercises/3_5.description.6') }}
    <code>(2, 4)</code>
    {{ __('exercises/3_5.description.7') }}
    <code>(8, 10)</code>
    {{ __('exercises/3_5.description.8') }}
    <code>(x,y)</code>
    {{ __('exercises/3_5.description.9') }}
    <code>P(x, y)</code>
    {{ __('exercises/3_5.description.10') }}
</p>
<p>
    {{ __('exercises/3_5.description.11') }}
    <code>estimate-integral</code>
    {{ __('exercises/3_5.description.12') }}
    <code>P</code>
    {{ __('exercises/3_5.description.13') }}
    <code>x1, x2, y1</code>
    {{ __('exercises/3_5.description.14') }}
    <code>y2</code>
    {{ __('exercises/3_5.description.15') }}
    <code>monte-carlo</code>
    {{ __('exercises/3_5.description.16') }}
    <code>&pi;</code>
    {{ __('exercises/3_5.description.17') }}
    <code>estimate-integral</code>
    {{ __('exercises/3_5.description.18') }}
    <code>&pi;</code>
    {{ __('exercises/3_5.description.19') }}
</p>
<p>
    {{ __('exercises/3_5.description.20') }}
    <code>random-in-range</code>
    {{ __('exercises/3_5.description.21') }}
    <code>random</code>
    {{ __('exercises/3_5.description.22') }}
    <a href="{{ getChapterOriginLinkForNumber('1.2.6') }}">1.2.6</a>
    {{ __('exercises/3_5.description.23') }}
</p>
<pre><code>(define (random-in-range low high)
    (let ((range (- high low)))
        (+ low (random range))))</code></pre>
