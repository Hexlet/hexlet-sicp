import React, {
  useRef, useEffect, useLayoutEffect,
} from 'react'

import { useDispatch, useSelector } from 'react-redux'
import { EditorView, basicSetup } from 'codemirror'
import { EditorState } from '@codemirror/state'
import { StreamLanguage } from '@codemirror/language'
import { scheme } from '@codemirror/legacy-modes/mode/scheme'
import { basicDark } from 'cm6-theme-basic-dark'
import { basicLight } from 'cm6-theme-basic-light'
import { useTranslation } from 'react-i18next'
import { changeContent } from '../slices/editorSlice.js'
import codeTemplates from '../common/codeTemplates.js'
import theme from '../common/currentTheme'

const myTheme = theme === 'dark' ? basicDark : basicLight

const EditorBuilder = () => {
  const { focusesCount } = useSelector(state => state.editor)
  const { hasTests, preparedCode } = useSelector(state => state.exerciseInfo)

  const editorRef = useRef()
  const viewRef = useRef()
  const contentRef = useRef()
  const dispatch = useDispatch()
  const { t } = useTranslation()

  const onChange = EditorView.updateListener.of((v) => {
    if (v.docChanged) {
      const value = v.state.doc.toString()
      dispatch(changeContent({ content: value }))
    }
  })

  useLayoutEffect(() => {
    if (hasTests) {
      dispatch(changeContent({ content: codeTemplates.withTemplate(t('editorContent.withTemplate'), preparedCode) }))
      contentRef.current = codeTemplates.withTemplate(t('editorContent.withTemplate'), preparedCode)
    }
    else {
      dispatch(changeContent({ content: codeTemplates.withoutTemplate(t('editorContent.withoutTemplate')) }))
      contentRef.current = codeTemplates.withoutTemplate(t('editorContent.withoutTemplate'))
    }
  }, [dispatch, hasTests, preparedCode, t])

  useEffect(() => {
    viewRef.current = new EditorView({
      state: EditorState.create({
        doc: contentRef.current,
        extensions: [
          basicSetup,
          StreamLanguage.define(scheme),
          myTheme,
          onChange,
        ],
      }),
      parent: editorRef.current,
    })

    const cursorLocation = hasTests ? contentRef.current.indexOf('\n') + 1 : contentRef.current.length
    viewRef.current.dispatch({ selection: { anchor: cursorLocation } })

    viewRef.current.focus()

    return () => {
      viewRef.current.destroy()
    }
  }, [])

  useEffect(() => {
    viewRef?.current.focus()
  }, [focusesCount])

  return <div ref={editorRef} />
}

export default EditorBuilder
