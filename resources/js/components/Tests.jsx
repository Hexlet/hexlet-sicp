import React from 'react'
import { useSelector } from 'react-redux'
import { Light as Highlight } from 'react-syntax-highlighter'
import { vs, monokaiSublime } from 'react-syntax-highlighter/dist/esm/styles/hljs'
import theme from '../common/currentTheme'

const Tests = () => {
  const { hasTests, testCode } = useSelector(state => state.exerciseInfo)

  return hasTests
    ? (
        <div className="d-flex h-100">
          <Highlight
            className="h-100 w-100"
            language="scheme"
            style={theme === 'dark' ? monokaiSublime : vs}
            showLineNumbers
          >
            {testCode}
          </Highlight>
        </div>
      )
    : null
}

export default Tests
