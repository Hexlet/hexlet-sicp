<p>
    {{ __('exercises/3_9.description1') }}
    <a href="{{ getChapterOriginLink('1.2.1') }}">1.2.1</a>
    {{ __('exercises/3_9.description2') }}
</p>
<pre><code>(define (factorial n)
  (if (= n 1)
      1
      (* n (factorial (- n 1)))))</code></pre>
<p>
     {{ __('exercises/3_9.description3') }}
</p>
<pre><code>(define (factorial n)
  (fact-iter 1 1 n))
(define (fact-iter product counter max-count)
  (if (> counter max-count)
      product
      (fact-iter (* counter product)
                 (+ counter 1)
                 max-count)))</code></pre>
<p>
    {{ __('exercises/3_9.description4') }}
    <code>(factorial 6)</code>
    {{ __('exercises/3_9.description5') }}
    <code>factorial</code>
    {{ __('exercises/3_9.description6') }}
</p>
