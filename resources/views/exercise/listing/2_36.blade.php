<p>{{ __('exercises/2_36.description.1') }}
<code>accumulate-n</code>
{{ __('exercises/2_36.description.2') }}
<code>accumulate</code>
{{ __('exercises/2_36.description.3') }}
<code>s</code>
{{ __('exercises/2_36.description.4') }}
<code>((1 2 3) (4 5 6) (7 8 9) (10 11 12))</code>
{{ __('exercises/2_36.description.5') }}
<code>(accumulate-n + 0 s)</code>
{{ __('exercises/2_36.description.6') }}
<code>(22 26 30)</code>
{{ __('exercises/2_36.description.7') }}
<code>accumulate-n</code>
{{ __('exercises/2_36.description.8') }}
</p>
<pre><code>(define (accumulate-n op init seqs)
  (if (null? (car seqs))
      nil
      (cons (accumulate op init &lt;??&gt;)
            (accumulate-n op init &lt;??&gt;))))
</code></pre>
