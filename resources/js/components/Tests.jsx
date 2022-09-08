import React from 'react';
import { useSelector } from 'react-redux';
import Highlight from 'react-syntax-highlighter';
import { vs } from 'react-syntax-highlighter/dist/esm/styles/hljs';

const Tests = () => {
  const { hasTests, testCode } = useSelector((state) => state.exerciseInfo);

  return hasTests ? (
    <div className="d-flex h-100">
      <Highlight className="h-100" language="scheme" style={vs} showLineNumbers>
        {testCode}
      </Highlight>
    </div>
  ) : null;
};

export default Tests;
