import React from 'react';
import { useSelector } from 'react-redux';
import Highlight from './Highlight';

const Tests = () => {
  const { hasTests, testCode } = useSelector((state) => state.exerciseInfo);

  return hasTests ? (
    <div className="d-flex flex-column h-100">
      <Highlight>
        {testCode}
      </Highlight>
    </div>
  ) : null;
};

export default Tests;
