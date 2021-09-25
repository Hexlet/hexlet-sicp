<p>{{ __('exercises/2_64.description.1') }}
<code>list->tree</code>
{{ __('exercises/2_64.description.2') }}
<code>partial-tree</code>
{{ __('exercises/2_64.description.3') }}
<code>n</code>
{{ __('exercises/2_64.description.4') }}
<code>n</code>
{{ __('exercises/2_64.description.5') }}
<code>n</code>
{{ __('exercises/2_64.description.6') }}
<code>partial-tree</code>
{{ __('exercises/2_64.description.7') }}
<code>cons</code>
{{ __('exercises/2_64.description.8') }}
<code>car</code>
{{ __('exercises/2_64.description.9') }}
<code>cdr</code>
{{ __('exercises/2_64.description.10') }}
</p>
<pre><code>(define (list->tree elements)
  (car (partial-tree elements (length elements))))

(define (partial-tree elts n)
  (if (= n 0)
      (cons '() elts)
      (let ((left-size (quotient (- n 1) 2)))
        (let ((left-result (partial-tree elts left-size)))
          (let ((left-tree (car left-result))
                (non-left-elts (cdr left-result))
                (right-size (- n (+ left-size 1))))
            (let ((this-entry (car non-left-elts))
                  (right-result (partial-tree (cdr non-left-elts)
                                              right-size)))
              (let ((right-tree (car right-result))
                    (remaining-elts (cdr right-result)))
                (cons (make-tree this-entry left-tree right-tree)
                      remaining-elts))))))))
</code></pre>
<p>{{ __('exercises/2_64.description.11') }}
<code>partial-tree</code>
{{ __('exercises/2_64.description.12') }}
<code>list->tree</code>
{{ __('exercises/2_64.description.13') }}
<code>(1 3 5 7 9 11)</code>
</p>
<p>{{ __('exercises/2_64.description.14') }}
<code>list->tree</code>
{{ __('exercises/2_64.description.15') }}
<code>n</code>
{{ __('exercises/2_64.description.16') }}
</p>
