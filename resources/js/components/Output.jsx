// @ts-check
/* eslint-disable react/no-danger */

import React from 'react';
import { useSelector } from 'react-redux';
import { Alert } from 'react-bootstrap';
import { useTranslation } from 'react-i18next';

const statusToTypeMap = {
  success: 'success',
  failure: 'danger',
};

const Output = () => {
  const { t } = useTranslation();
  const { resultStatus, output } = useSelector((state) => state.checkResult);

  if (resultStatus === 'idle') {
    return null;
  }

  const message = t(`message.${resultStatus}`);

  const alertClassName = `${statusToTypeMap[resultStatus]}`;
  return (
    <div className="h-100">
      <Alert variant={alertClassName}>
        {message}
      </Alert>
      <pre>
        <code>
          {output}
        </code>
      </pre>
    </div>
  );
};

export default Output;
