import React, { useEffect, useState } from 'react';
import { UnControlled as CodeMirrorEditor } from 'react-codemirror2';
import { useDispatch, useSelector } from 'react-redux';
import { changeContent } from '../slices/editorSlice.js';

import 'codemirror/lib/codemirror.css';
import 'codemirror/addon/scroll/simplescrollbars.css';
import 'codemirror/addon/scroll/simplescrollbars.js';
import 'codemirror/addon/edit/closebrackets.js';
import 'codemirror/addon/edit/matchbrackets.js';

import 'codemirror/mode/scheme/scheme.js';
import 'codemirror/keymap/sublime.js';

const Editor = () => {
  const { content, focusesCount } = useSelector((state) => state.editor);
  const [editor, setEditor] = useState(null);
  const dispatch = useDispatch();

  useEffect(() => {
    editor?.focus();
  }, [focusesCount, editor]);

  const onMount = (self) => {
    setEditor(self);
    self.focus();
    self.refresh();
  };

  const onContentChange = (_editor, _data, newContent) => {
    // setContent(newContent); // это для localStorage. См. позже
    dispatch(changeContent({ content: newContent }));
  };

  const options = {
    autoCloseBrackets: {
      override: true,
    },
    autofocus: true,
    keyMap: 'sublime',
    matchBrackets: true,
    scrollbarStyle: 'overlay',
    lineNumbers: true,
    tabSize: 2,
  };

  return (
    <CodeMirrorEditor
      value={content}
      options={options}
      detach
      onChange={onContentChange}
      editorDidMount={onMount}
      className="h-100 w-100"
    />
  );
};

export default Editor;
