import Editor from './Editor.jsx';
import { Nav, Tab, Button } from 'react-bootstrap';

const App = () => (
  <div id='editorWrapper' className='card h-75 px-0'>
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
    <div className='d-flex py-2 w-100 justify-content-end card-footer py-3'>
      <Button variant="primary">Запустить</Button>
    </div>
  </div>
);

export default App;
