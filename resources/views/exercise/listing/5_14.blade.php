<p>{{ __('exercises/5_14.description.1') }}
<code>n!</code>
{{ __('exercises/5_14.description.2') }}
<code>n</code>
{{ __('exercises/5_14.description.3') }}
<code>n</code>
{{ __('exercises/5_14.description.4') }}
<code>n!</code>
{{ __('exercises/5_14.description.5') }}
<code>n > 1</code>
{{ __('exercises/5_14.description.6') }}
<code>n</code>
{{ __('exercises/5_14.description.7') }}
<code>n</code>
{{ __('exercises/5_14.description.8') }}
<code>get-register-contents</code>
{{ __('exercises/5_14.description.9') }}
<code>set-register-contents!</code>
{{ __('exercises/5_14.description.10') }}
<code>start</code>
{{ __('exercises/5_14.description.11') }}
</p>
<img class="img-fluid" src="{{ mix('images/exercises/5_14.gif') }}" alt="5.14">
<pre><code>(controller
  gcd-loop
    (assign a (op read))
    (assign b (op read))
  test-b
    (test (op =) (reg b) (const 0))
    (branch (label gcd-done))
    (assign t (op rem) (reg a) (reg b))
    (assign a (reg b))
    (assign b (reg t))
    (goto (label test-b))
  gcd-done
    (perform (op print) (reg a))
    (goto (label gcd-loop)))
</code></pre>
<p>{{ __('exercises/5_14.description.12') }}</p>
<img class="img-fluid" src="{{ mix('images/exercises/5_12.gif') }}" alt="5.12">
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
<p>{{ __('exercises/5_14.description.13') }}</p>
