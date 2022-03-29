import React from 'react';
import { useSelector } from 'react-redux';
import { Alert } from 'react-bootstrap';
import { useTranslation } from 'react-i18next';
import Highlight from './Highlight';

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
      <Highlight>
        {output}
      </Highlight>
    </div>
  );
};

export default Output;
