// @ts-check
/* eslint-disable react/no-danger */

import React from 'react';
import { useSelector } from 'react-redux';
import { useTranslation } from 'react-i18next';

const statusToTypeMap = {
  success: 'success',
  failure: 'danger',
};

const Output = () => {
  const { t } = useTranslation();
  const checkResult = useSelector((state) => state.checkResult);

  if (checkResult.resultStatus === 'idle') {
    return null;
  }

  const message = t(`message.${checkResult.resultStatus}`);

  const alertClassName = `mt-auto alert alert-${statusToTypeMap[checkResult.resultStatus]}`;
  return (
    <div className="d-flex flex-column h-100">
      <pre>
        <code className="nohighlight" dangerouslySetInnerHTML={{ __html: checkResult.output }} />
      </pre>
      <div className={alertClassName}>
        {message}
      </div>
    </div>
  );
};

export default Output;
