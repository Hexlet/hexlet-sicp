<p>
    {{ __('exercises/3_5.description1') }}
    <code>P(x, y)</code>
    {{ __('exercises/3_5.description2') }}
    <code>(x, y)</code>
    {{ __('exercises/3_5.description3') }}
    <code>3</code>
    {{ __('exercises/3_5.description4') }}
    <code>(5, 7)</code>
    {{ __('exercises/3_5.description5') }}
    <code>(x - 5)&sup2; + (y - 7)&sup2; &le; 3&sup2;</code>
    {{ __('exercises/3_5.description6') }}
    <code>(2, 4)</code>
    {{ __('exercises/3_5.description7') }}
    <code>(8, 10)</code>
    {{ __('exercises/3_5.description8') }}
    <code>(x,y)</code>
    {{ __('exercises/3_5.description9') }}
    <code>P(x, y)</code>
    {{ __('exercises/3_5.description10') }}
</p>
<p>
    {{ __('exercises/3_5.description11') }}
    <code>estimate-integral</code>
    {{ __('exercises/3_5.description12') }}
    <code>P</code>
    {{ __('exercises/3_5.description13') }}
    <code>x1, x2, y1</code>
    {{ __('exercises/3_5.description14') }}
    <code>y2</code>
    {{ __('exercises/3_5.description15') }}
    <code>monte-carlo</code>
    {{ __('exercises/3_5.description16') }}
    <code>&pi;</code>
    {{ __('exercises/3_5.description17') }}
    <code>estimate-integral</code>
    {{ __('exercises/3_5.description18') }}
    <code>&pi;</code>
    {{ __('exercises/3_5.description19') }}
</p>
<p>
    {{ __('exercises/3_5.description20') }}
    <code>random-in-range</code>
    {{ __('exercises/3_5.description21') }}
    <code>random</code>
    {{ __('exercises/3_5.description22') }}

    <a href="{{ getChapterOriginLink('1.2.6') }}">1.2.6</a>
    {{ __('exercises/3_5.description23') }}
</p>
<pre><code>(define (random-in-range low high)
    (let ((range (- high low)))
        (+ low (random range))))</code></pre>
