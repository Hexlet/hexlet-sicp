<p>{{ __('exercises/5_11.description.1') }}
<code>save</code>
{{ __('exercises/5_11.description.2') }}
<code>restore</code>
{{ __('exercises/5_11.description.3') }}
</p>
<pre><code>(save y)
(save x)
(restore y)</code></pre>
<p>{{ __('exercises/5_11.description.4') }}
<code>restore</code>
{{ __('exercises/5_11.description.5') }}
</p>
<p>{{ __('exercises/5_11.description.6') }}
<code>(restore y)</code>
{{ __('exercises/5_11.description.7') }}
<code>y</code>
{{ __('exercises/5_11.description.8') }}
</p>
<p>{{ __('exercises/5_11.description.9') }}
<code>(restore y)</code>
{{ __('exercises/5_11.description.10') }}
<code>y</code>
{{ __('exercises/5_11.description.11') }}
<code>y</code>
{{ __('exercises/5_11.description.12') }}
<code>save</code>
{{ __('exercises/5_11.description.13') }}
</p>
<p>{{ __('exercises/5_11.description.14') }}
<code>(restore y)</code>
{{ __('exercises/5_11.description.15') }}
<code>y</code>
{{ __('exercises/5_11.description.16') }}
<code>y</code>
{{ __('exercises/5_11.description.17') }}
<code>y</code>
{{ __('exercises/5_11.description.18') }}
<code>initialize-stack</code>
{{ __('exercises/5_11.description.19') }}
</p>
<pre><code>(controller
   (assign continue (label fib-done))
 fib-loop
   (test (op <) (reg n) (const 2))
   (branch (label immediate-answer))
   ;; set up to compute Fib(n - 1)
   (save continue)
   (assign continue (label afterfib-n-1))
   (save n)                           ; save old value of n
   (assign n (op -) (reg n) (const 1)); clobber n to n - 1
   (goto (label fib-loop))            ; perform recursive call
 afterfib-n-1                         ; upon return, val contains Fib(n - 1)
   (restore n)
   (restore continue)
   ;; set up to compute Fib(n - 2)
   (assign n (op -) (reg n) (const 2))
   (save continue)
   (assign continue (label afterfib-n-2))
   (save val)                         ; save Fib(n - 1)
   (goto (label fib-loop))
 afterfib-n-2                         ; upon return, val contains Fib(n - 2)
   (assign n (reg val))               ; n now contains Fib(n - 2)
   (restore val)                      ; val now contains Fib(n - 1)
   (restore continue)
   (assign val                        ;  Fib(n - 1) +  Fib(n - 2)
           (op +) (reg val) (reg n)) 
   (goto (reg continue))              ; return to caller, answer is in val
 immediate-answer
   (assign val (reg n))               ; base case:  Fib(n) = n
   (goto (reg continue))
 fib-done)
</code></pre>
<p>{{ __('exercises/5_11.description.20') }}</p>
