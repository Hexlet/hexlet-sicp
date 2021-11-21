<p>{{ __('exercises/4_47.description.1') }}
<code>parse-verb-phrase</code>
{{ __('exercises/4_47.description.2') }}
</p>
<pre><code>(define (parse-verb-phrase)
  (amb (parse-word verbs)
       (list 'verb-phrase
             (parse-verb-phrase)
             (parse-prepositional-phrase))))
</code></pre>
<p>{{ __('exercises/4_47.description.3') }}
<code>amb</code>
{{ __('exercises/4_47.description.4') }}
</p>
