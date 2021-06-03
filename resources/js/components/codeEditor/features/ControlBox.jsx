import React from 'react';
import { Button } from 'react-bootstrap';
import { useSelector } from 'react-redux';

const ControlBox = () => {
  const editor = useSelector((state) => state.editor);

  const handleRunCheck = () => {
    alert(editor.content);
    // TODO: надо думать что делать дальше
  };

  return (
    <div className='d-flex py-2 w-100 justify-content-end card-footer py-3'>
      <Button
        onClick={handleRunCheck}
        variant="primary"
        onClick={handleRunCheck}
      >
        Запустить
      </Button>
    </div>
  );
};

export default ControlBox;
