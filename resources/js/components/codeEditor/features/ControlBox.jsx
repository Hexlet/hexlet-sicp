import React from 'react';
import { Button } from 'react-bootstrap';

const ControlBox = () => {
  const handleRunCheck = () => {
    // TODO: что-то типо того:
    // dispatch(actions.runCheck({ lessonVersion, editor }));
    // editor: state.editorSlice,
    // в CBs editor из которого в дальнейшем достается value
    // храниться в state приложения 
    // const value = dpanm 
  };

  return (
    <div className='d-flex py-2 w-100 justify-content-end card-footer py-3'>
      <Button onClick={handleRunCheck} variant="primary">Запустить</Button>
    </div>
  );
};

export default ControlBox;
