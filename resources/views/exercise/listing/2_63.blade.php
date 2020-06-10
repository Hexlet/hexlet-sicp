<p>{{ __('exercises/2_63.description.1') }}</p>
<pre><code>(define (tree->list-1 tree)
  (if (null? tree)
      '()
      (append (tree->list-1 (left-branch tree))
              (cons (entry tree)
                    (tree->list-1 (right-branch tree))))))

(define (tree->list-2 tree)
  (define (copy-to-list tree result-list)
    (if (null? tree)
        result-list
        (copy-to-list (left-branch tree)
                      (cons (entry tree)
                            (copy-to-list (right-branch tree)
                                          result-list)))))
  (copy-to-list tree '()))
</code></pre>
<p>{{ __('exercises/2_63.description.2') }}</p>
<p>{{ __('exercises/2_63.description.3') }}</p>
