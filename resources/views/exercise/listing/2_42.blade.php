<img class="img-fluid" src="{{ asset('images/exercises/2_42.gif') }}" alt="2.42">
<p>{{ __('exercises/2_42.description.1') }}</p>
<p>{{ __('exercises/2_42.description.2') }}
<code>k − 1</code>
{{ __('exercises/2_42.description.3') }}
<code>k</code>
{{ __('exercises/2_42.description.4') }}
<code>k − 1</code>
{{ __('exercises/2_42.description.5') }}
<code>k − 1</code>
{{ __('exercises/2_42.description.6') }}
<code>k</code>
{{ __('exercises/2_42.description.7') }}
<code>k</code>
{{ __('exercises/2_42.description.8') }}
</p>
<p>{{ __('exercises/2_42.description.9') }}
<code>queens</code>
{{ __('exercises/2_42.description.10') }}
<code>n</code>
{{ __('exercises/2_42.description.11') }}
<code>n × n</code>
{{ __('exercises/2_42.description.12') }}
<code>queens</code>
{{ __('exercises/2_42.description.13') }}
<code>queen-cols</code>
{{ __('exercises/2_42.description.14') }}
<code>k</code>
{{ __('exercises/2_42.description.15') }}
</p>
<pre><code>(define (queens board-size)
  (define (queen-cols k)
    (if (= k 0)
        (list empty-board)
        (filter
         (lambda (positions) (safe? k positions))
         (flatmap
          (lambda (rest-of-queens)
            (map (lambda (new-row)
                   (adjoin-position new-row k rest-of-queens))
                 (enumerate-interval 1 board-size)))
          (queen-cols (- k 1))))))
  (queen-cols board-size))
</code></pre>
<p>{{ __('exercises/2_42.description.16') }}
<code>rest-of-queens</code>
{{ __('exercises/2_42.description.17') }}
<code>k − 1</code>
{{ __('exercises/2_42.description.18') }}
<code>k − 1</code>
{{ __('exercises/2_42.description.19') }}
<code>new-row</code>
{{ __('exercises/2_42.description.20') }}
<code>k</code>
{{ __('exercises/2_42.description.21') }}
<code>adjoin-position</code>
{{ __('exercises/2_42.description.22') }}
<code>empty-board</code>
{{ __('exercises/2_42.description.23') }}
<code>safe?</code>
{{ __('exercises/2_42.description.24') }}
<code>k</code>
{{ __('exercises/2_42.description.25') }}
</p>
