<p>
    {{ __('exercises/3_2.description.1') }}
    <code>make-monitored</code>
    {{ __('exercises/3_2.description.2') }}
    <code>f</code>
    {{ __('exercises/3_2.description.3') }}
    <code>make-monitored</code>
    {{ __('exercises/3_2.description.4') }}
    <code>mf</code>
    {{ __('exercises/3_2.description.5') }}
    <code>mf</code>
    {{ __('exercises/3_2.description.6') }}
    <code>how-many-calls?</code>
    {{ __('exercises/3_2.description.7') }}
    <code>reset-count</code>, <code>mf</code>
    {{ __('exercises/3_2.description.8') }}
    <code>mf</code>
    {{ __('exercises/3_2.description.9') }}
    <code>f</code>
    {{ __('exercises/3_2.description.10') }}
    <code>sqrt</code>
    {{ __('exercises/3_2.description.11') }}
</p>
<pre><code>(define s (make-monitored sqrt))
(s 100)
<i>10</i>
(s 'how-many-calls?)
<i>1</i></code></pre>
