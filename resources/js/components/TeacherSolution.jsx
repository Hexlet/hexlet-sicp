import React from 'react';
import { useSelector } from 'react-redux';
import Highlight from 'react-syntax-highlighter';
import { vs, vs2015 } from 'react-syntax-highlighter/dist/esm/styles/hljs';
import theme from '../common/currentTheme';

const TeacherSolution = () => {
  const { hasTeacherSolution, teacherSolutionCode } = useSelector((state) => state.exerciseInfo);

  return hasTeacherSolution ? (
    <div className="d-flex h-100">
      <Highlight
        className="h-100"
        language="scheme"
        style={theme === 'dark' ? vs2015 : vs}
        showLineNumbers
      >
        {teacherSolutionCode}
      </Highlight>
    </div>
  ) : null;
};

export default TeacherSolution;
