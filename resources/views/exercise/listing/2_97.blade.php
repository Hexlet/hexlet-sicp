<p>{{ __('exercises/2_97.description.1') }}
<code>reduce-terms</code>
{{ __('exercises/2_97.description.2') }}
<code>n</code>
{{ __('exercises/2_97.description.3') }}
<code>d</code>
{{ __('exercises/2_97.description.4') }}
<code>nn</code>
{{ __('exercises/2_97.description.5') }}
<code>dd</code>
{{ __('exercises/2_97.description.6') }}
<code>n</code>
{{ __('exercises/2_97.description.7') }}
<code>d</code>
{{ __('exercises/2_97.description.8') }}
<code>reduce-poly</code>
{{ __('exercises/2_97.description.9') }}
<code>add-poly</code>
{{ __('exercises/2_97.description.10') }}
<code>poly</code>
{{ __('exercises/2_97.description.11') }}
<code>reduce-poly</code>
{{ __('exercises/2_97.description.12') }}
<code>reduce-terms</code>
{{ __('exercises/2_97.description.13') }}
<code>reduce-terms</code>
{{ __('exercises/2_97.description.14') }}
</p>
<p>{{ __('exercises/2_97.description.15') }}
<code>reduce-terms</code>
{{ __('exercises/2_97.description.16') }}
<code>make-rat</code>
{{ __('exercises/2_97.description.17') }}
</p>
<pre><code>(define (reduce-integers n d)
  (let ((g (gcd n d)))
    (list (/ n g) (/ d g))))
</code></pre>
<p>{{ __('exercises/2_97.description.18') }}
<code>reduce</code>
{{ __('exercises/2_97.description.19') }}
<code>apply-generic</code>
{{ __('exercises/2_97.description.20') }}
<code>reduce-poly</code>
{{ __('exercises/2_97.description.21') }}
<code>reduce-integers</code>
{{ __('exercises/2_97.description.22') }}
<code>scheme-number</code>
{{ __('exercises/2_97.description.23') }}
<code>make-rat</code>
{{ __('exercises/2_97.description.24') }}
<code>reduce</code>
{{ __('exercises/2_97.description.25') }}
</p>
<pre><code>(define p1 (make-polynomial 'x '((1 1)(0 1))))
(define p2 (make-polynomial 'x '((3 1)(0 -1))))
(define p3 (make-polynomial 'x '((1 1))))
(define p4 (make-polynomial 'x '((2 1)(0 -1))))

(define rf1 (make-rational p1 p2))
(define rf2 (make-rational p3 p4))

(add rf1 rf2)
</code></pre>
<p>{{ __('exercises/2_97.description.26') }}</p>
<p>{{ __('exercises/2_97.description.27') }}</p>
