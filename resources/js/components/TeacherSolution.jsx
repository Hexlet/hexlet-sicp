import React from 'react';
import { useSelector } from 'react-redux';
import Highlight from 'react-syntax-highlighter';
import { vs } from 'react-syntax-highlighter/dist/esm/styles/hljs';

const TeacherSolution = () => {
  const { hasTeacherSolution, teacherSolution } = useSelector((state) => state.exerciseInfo);

  return hasTeacherSolution ? (
    <div className="d-flex h-100">
      <Highlight className="h-100" language="scheme" style={vs} showLineNumbers>
        {teacherSolution}
      </Highlight>
    </div>
  ) : null;
};

export default TeacherSolution;
