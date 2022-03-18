import React from "react";
import { useSelector } from "react-redux";

const Tests = () => {
  const { hasTests, testCode } = useSelector((state) => state.exerciseInfo);

  return hasTests ? (
    <div className="d-flex flex-column h-100">
      <pre>
        <code>
          {testCode}
        </code>
      </pre>
    </div>
  ) : null;
};

export default Tests;
