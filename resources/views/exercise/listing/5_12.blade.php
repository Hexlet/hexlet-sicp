<p>{{ __('exercises/5_12.description.1') }}</p>
<ul>
    <li>{{ __('exercises/5_12.description.2') }}
    <code>assign</code>
    {{ __('exercises/5_12.description.3') }}
    <code>goto</code>
    {{ __('exercises/5_12.description.4') }}
    </li>
    <li>{{ __('exercises/5_12.description.5') }}
    <code>goto</code>
    {{ __('exercises/5_12.description.6') }}
    </li>
    <li>{{ __('exercises/5_12.description.7') }}
    <code>save</code>
    {{ __('exercises/5_12.description.8') }}
    <code>restore</code>
    {{ __('exercises/5_12.description.9') }}
    </li>
    <li>{{ __('exercises/5_12.description.10') }}
    <code>val</code>
    {{ __('exercises/5_12.description.11') }}
    <code>(const 1)</code>
    {{ __('exercises/5_12.description.12') }}
    <code>((op *) (reg n) (reg val))</code>
    {{ __('exercises/5_12.description.13') }}
    </li>
</ul>
<p>{{ __('exercises/5_12.description.14') }}</p>
<img class="img-fluid" src="{{ Vite::asset("resources/assets/images/exercises/5_12.gif") }}" alt="5.12">
<pre><code>(controller
   (assign continue (label fact-done))     ; set up final return address
 fact-loop
   (test (op =) (reg n) (const 1))
   (branch (label base-case))
   ;; Set up for the recursive call by saving n and continue.
   ;; Set up continue so that the computation will continue
   ;; at after-fact when the subroutine returns.
   (save continue)
   (save n)
   (assign n (op -) (reg n) (const 1))
   (assign continue (label after-fact))
   (goto (label fact-loop))
 after-fact
   (restore n)
   (restore continue)
   (assign val (op *) (reg n) (reg val))   ; val now contains n(n - 1)!
   (goto (reg continue))                   ; return to caller
 base-case
   (assign val (const 1))                  ; base case: 1! = 1
   (goto (reg continue))                   ; return to caller
 fact-done)
</code></pre>
<p>{{ __('exercises/5_12.description.15') }}</p>
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
<p>{{ __('exercises/5_12.description.16') }}</p>
