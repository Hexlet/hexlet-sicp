import hljs from 'highlight.js/lib/core';
import scheme from 'highlight.js/lib/languages/scheme';
import vbnet from 'highlight.js/lib/languages/vbnet';
import sql from 'highlight.js/lib/languages/sql';
import 'highlight.js/styles/github.css';
import './highlight.css';
import React, { useCallback, useEffect, useRef } from 'react';

hljs.registerLanguage('scheme', scheme);
hljs.registerLanguage('vbnet', vbnet);
hljs.registerLanguage('sql', sql);
hljs.addPlugin({
  'after:highlightElement': ({ el, result }) => {
    const lines = result.value.split('\n');
    const buildLine = (line, lineNumber) => `<tr><td class="hljs-ln"><span>${lineNumber}</span></td><td class="hljs-line">${line}</td></tr>`;
    const linedCode = lines.map((line, index) => buildLine(line, index + 1)).join('\n');
    // eslint-disable-next-line no-param-reassign
    el.innerHTML = `<table><tbody>${linedCode}</tbody></table>`;
  },
});

const Highlight = (props) => {
  const codeBlock = useRef(null);

  const highlightCode = useCallback(() => {
    const nodes = codeBlock.current.querySelectorAll('pre code');
    nodes.forEach((node) => hljs.highlightElement(node));
  }, [codeBlock]);

  useEffect(() => highlightCode(), [highlightCode]);

  const { children, className = null } = props;
  return (
    <pre ref={codeBlock}>
      <code className={className}>
        {children}
      </code>
    </pre>
  );
};

export default Highlight;
