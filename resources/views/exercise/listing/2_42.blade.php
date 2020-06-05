<img class="img-fluid" src="{{ asset('img/exercises/2_42.gif') }}" alt="2.42">
<p>{{ __('exercises/2_42.description.1') }}</p>
<p>{{ __('exercises/2_42.description.2') }}</p>
<p>{{ __('exercises/2_42.description.3') }}</p>
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
<p>{{ __('exercises/2_42.description.4') }}</p>
