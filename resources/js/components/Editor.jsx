import React, { useEffect, useLayoutEffect, useState } from 'react';
import { Spinner } from 'react-bootstrap';
import { Controlled as CodeMirrorEditor } from 'react-codemirror2-react-17';
import { useDispatch, useSelector } from 'react-redux';
import { useTranslation } from 'react-i18next';
import { changeContent } from '../slices/editorSlice.js';
import codeTemplates from '../common/codeTemplates.js';
import theme from '../common/currentTheme';

import 'codemirror/lib/codemirror.css';
import 'codemirror/theme/material-darker.css';
import 'codemirror/theme/neat.css';
import 'codemirror/addon/scroll/simplescrollbars.css';
import 'codemirror/addon/scroll/simplescrollbars.js';
import 'codemirror/addon/edit/closebrackets.js';
import 'codemirror/addon/edit/matchbrackets.js';
import 'codemirror/mode/scheme/scheme.js';
import 'codemirror/keymap/sublime.js';

const Editor = () => {
  const { content, focusesCount } = useSelector((state) => state.editor);
  const { hasTests, preparedCode, loadingState } = useSelector((state) => state.exerciseInfo);
  const [editor, setEditor] = useState(null);
  const dispatch = useDispatch();
  const { t } = useTranslation();

  useEffect(() => {
    if (hasTests) {
      dispatch(changeContent({ content: codeTemplates.withTemplate(t('editorContent.withTemplate'), preparedCode) }));
    } else {
      dispatch(changeContent({ content: codeTemplates.withoutTemplate(t('editorContent.withoutTemplate')) }));
    }
  }, [dispatch, preparedCode, hasTests, t]);

  useLayoutEffect(() => {
    editor?.refresh();
    editor?.focus();
  }, [focusesCount, editor]);

  const onMount = (self) => {
    self.setSize('100%', '100%');
    setEditor(self);
  };

  const onContentChange = (_editor, _data, newContent) => {
    // setContent(newContent); // это для localStorage. См. позже
    dispatch(changeContent({ content: newContent }));
    editor.refresh();
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
    theme: theme === 'dark' ? 'material-darker' : 'neat',
  };

  return loadingState === 'loading'
    ? (
      <div className="d-flex h-100 justify-content-center align-items-center">
        <Spinner animation="border" role="status" variant="primary">
          <span className="visually-hidden">{t('loading')}</span>
        </Spinner>
      </div>
    )
    : (
      <CodeMirrorEditor
        value={content}
        options={options}
        onBeforeChange={onContentChange}
        editorDidMount={onMount}
        className="h-100 w-100"
      />
    );
};

export default Editor;
