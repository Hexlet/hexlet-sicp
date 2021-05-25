import React from 'react';
import { UnControlled as CodeMirrorEditor } from 'react-codemirror2';

import 'codemirror/mode/scheme/scheme.js';
// import 'codemirror/mode/commonlisp/commonlisp.js';
import 'codemirror/lib/codemirror.css';
import 'codemirror/keymap/sublime.js';

const Editor = () => {
  const initialValue = `#lang racket

#| BEGIN (write your solution here) |#
(displayln "Hello, World!")
  
#| END |#
`;

  return (
    <CodeMirrorEditor
      value={initialValue}
      options={{
        // mode: 'text/x-common-lisp',
        // mode: 'scheme',
        lineNumbers: true,
        tabSize: 2,
        keyMap: 'sublime',
        autofocus: true,
      }}
      onChange={(editor, data, value) => {
        console.log('editor :');
        console.log(editor);
        console.log('Data :');
        console.log(data);
        console.log('value');
        console.log(value);
      }}
      className="h-100 w-100"
    />
  );
};


export default Editor;
