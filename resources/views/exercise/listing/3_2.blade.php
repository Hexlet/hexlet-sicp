<p>
    {{ __('exercises/3_2.description1') }}
    <code>make-monitored</code>
    {{ __('exercises/3_2.description2') }}
    <code>f</code>
    {{ __('exercises/3_2.description3') }}
    <code>make-monitored</code>
    {{ __('exercises/3_2.description4') }}
    <code>mf</code>
    {{ __('exercises/3_2.description5') }}
    <code>mf</code>
    {{ __('exercises/3_2.description6') }}
    <code>how-many-calls?</code>
    {{ __('exercises/3_2.description7') }}
    <code>reset-count</code>, <code>mf</code>
    {{ __('exercises/3_2.description8') }}
    <code>mf</code>
    {{ __('exercises/3_2.description9') }}
    <code>f</code>
    {{ __('exercises/3_2.description10') }}
    <code>sqrt</code>
    {{ __('exercises/3_2.description11') }}
</p>
<pre><code>(define s (make-monitored sqrt))
(s 100)
10
(s 'how-many-calls?)
1</code></pre>
