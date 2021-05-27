import React from 'react';
import Editor from '../editor/Editor.jsx';
import { Nav, Tab } from 'react-bootstrap';

const TabsBox = () => {

  return (
    <Tab.Container defaultActiveKey="editor" className='card-body'>
      <Nav variant='tabs' className='justify-content-center'>
        <Nav.Item>
          <Nav.Link eventKey="editor">Редактор</Nav.Link>
        </Nav.Item>
        <Nav.Item>
          <Nav.Link eventKey="tests">Тесты</Nav.Link>
        </Nav.Item>
        <Nav.Item>
          <Nav.Link eventKey="output">Вывод</Nav.Link>
        </Nav.Item>
      </Nav>
      <Tab.Content className='h-100 overflow-auto'>
        <Tab.Pane eventKey="editor" className='h-100'>
          <Editor />
        </Tab.Pane>
        <Tab.Pane eventKey="tests">
          Результат тестов
        </Tab.Pane>
        <Tab.Pane eventKey="output">
          Вывод
        </Tab.Pane>
      </Tab.Content>
    </Tab.Container>
  );
};

export default TabsBox;
