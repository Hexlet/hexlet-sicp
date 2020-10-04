<p>{{ __('exercises/5_45.description.1') }}</p>
<p>{{ __('exercises/5_45.description.2') }}<a href="{{ route('exercises.show', getExercise('5.27')) }}">5.27</a>
{{ __('exercises/5_45.description.3') }}<a href="{{ route('exercises.show', getExercise('5.14')) }}">5.14</a>
{{ __('exercises/5_45.description.4') }}</p>
<p>{{ __('exercises/5_45.description.5') }}</p>
<p>{{ __('exercises/5_45.description.6') }}</p>
<p>{{ __('exercises/5_45.description.7') }}</p>
<img class="img-fluid" src="{{ asset('img/exercises/5_12.gif') }}" alt="5.12">
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
<p>{{ __('exercises/5_45.description.8') }}</p>
