import React from 'react';
import { useSelector } from 'react-redux';
import Highlight from 'react-syntax-highlighter';
import { vs, vs2015 } from 'react-syntax-highlighter/dist/esm/styles/hljs';
import theme from '../common/currentTheme';

const Tests = () => {
  const { hasTests, testCode } = useSelector((state) => state.exerciseInfo);

  return hasTests ? (
    <div className="d-flex h-100">
      <Highlight
        className="h-100"
        language="scheme"
        style={theme === 'dark' ? vs2015 : vs}
        showLineNumbers
      >
        {testCode}
      </Highlight>
    </div>
  ) : null;
};

export default Tests;
