<p>{{ __('exercises/4_61.description.1') }}
<code>next-to</code>
{{ __('exercises/4_61.description.2') }}
</p>
<pre><code>(rule (?x next-to ?y in (?x ?y . ?u)))

(rule (?x next-to ?y in (?v . ?z))
      (?x next-to ?y in ?z))
</code></pre>
<p>{{ __('exercises/4_61.description.3') }}</p>
<pre><code>(?x next-to ?y in (1 (2 3) 4))

(?x next-to 1 in (2 1 3 1))
</code></pre>
