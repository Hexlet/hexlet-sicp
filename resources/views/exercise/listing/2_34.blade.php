<p>{{ __('exercises/2_34.description.1') }}</p>
<img class="img-fluid" src="{{ mix('img/exercises/2_34_1.gif') }}" alt="2.34.1">
<p>{{ __('exercises/2_34.description.2') }}</p>
<img class="img-fluid" src="{{ mix('img/exercises/2_34_2.gif') }}" alt="2.34.2">
<p>{{ __('exercises/2_34.description.3') }}</p>
<pre><code>(define (horner-eval x coefficient-sequence)
  (accumulate (lambda (this-coeff higher-terms) &lt;??&gt;)
              0
              coefficient-sequence))
</code></pre>
<p>{{ __('exercises/2_34.description.4') }}</p>
<pre><code>(horner-eval 2 (list 1 3 0 5 0 1))
</code></pre>
