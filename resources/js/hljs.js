import hljs from 'highlight.js/lib/core';
import scheme from 'highlight.js/lib/languages/scheme';
import vbnet from 'highlight.js/lib/languages/vbnet';
import sql from 'highlight.js/lib/languages/sql';
import 'highlight.js/styles/github.css';

hljs.registerLanguage('scheme', scheme);
hljs.registerLanguage('vbnet', vbnet);
hljs.registerLanguage('sql', sql);

Livewire.hook('message.processed', () => {
    hljs.highlightAll();
});

hljs.highlightAll();
