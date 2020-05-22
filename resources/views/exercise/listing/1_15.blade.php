<p>{{ __('exercises/1_15.description.1') }}</p>
<pre><code>sin(x) = 3sin(x / 3) − 4sin³(x / 3)</code></pre>
<p>{{ __('exercises/1_15.description.2') }}</p>
<pre><code>(define (cube x) (* x x x))

(define (p x) (- (* 3 x) (* 4 (cube x))))

(define (sine angle)
   (if (not (> (abs angle) 0.1))
       angle
       (p (sine (/ angle 3.0)))))</code></pre>
<p>{{ __('exercises/1_15.description.3') }}</p>
<p>{{ __('exercises/1_15.description.4') }}</p>
