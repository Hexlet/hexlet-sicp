import React from 'react';
import { useSelector } from 'react-redux';
import { Alert } from 'react-bootstrap';
import { useTranslation } from 'react-i18next';
import Highlight from 'react-syntax-highlighter';
import { vs, vs2015 } from 'react-syntax-highlighter/dist/esm/styles/hljs';
import theme from '../common/currentTheme';

const statusToTypeMap = {
  success: 'success',
  failure: 'danger',
};

const Output = () => {
  const { t } = useTranslation();
  const { resultStatus, output } = useSelector((state) => state.checkResult);
  const { show, style, content } = useSelector((state) => state.notification);

  const message = t(`message.${resultStatus}`);

  const alertClassName = `${statusToTypeMap[resultStatus]}`;

  const renderNotification = () => (
    show
      ? (
        <Alert className="mt-3 mx-3 mb-0" variant={style}>
          {content}
        </Alert>
      )
      : null
  );

  const renderOutput = () => (
    resultStatus === 'idle'
      ? null
      : (
        <>
          <Alert className="m-3" variant={alertClassName}>
            {message}
          </Alert>
          <Highlight
            className="flex-grow-1 m-0"
            language="vbnet"
            style={theme === 'dark' ? vs2015 : vs}
            showLineNumbers
          >
            {output}
          </Highlight>
        </>
      )
  );

  return (
    <div className="d-flex flex-column h-100">
      {renderNotification()}
      {renderOutput()}
    </div>
  );
};

export default Output;
