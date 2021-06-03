import React from 'react';
import Editor from '../editor/Editor.jsx';
import { Nav, Tab } from 'react-bootstrap';
import tabNames from './tabNamesMap.js';
import { useDispatch, useSelector } from 'react-redux';
import { changeTab } from './tabsBoxSlice.js';

const TabsBox = () => {
  const { currentTab } = useSelector((state) => state.tabsBox);
  const dispatch = useDispatch();

  const {
    editor, output, testForExercise,
  } = tabNames;

  const changeActiveTab = (newActiveTab) => {
    dispatch(changeTab({ newActiveTab }));
  };

  return (
    <Tab.Container activeKey={currentTab} onSelect={changeActiveTab} className='card-body'>
      <Nav variant='tabs' className='justify-content-center'>
        {Object.values(tabNames).map((tabName) => (
          <Nav.Item key={tabName}>
            <Nav.Link
              className="border-top-0 text-muted rounded-0"
              eventKey={tabName}
            >
              {tabName}
            </Nav.Link>
          </Nav.Item>
        ))}
      </Nav>
      <Tab.Content className='h-100 overflow-auto'>
        <Tab.Pane eventKey={editor} bsPrefix="tab-pane h-100 w-100">
          <Editor />
        </Tab.Pane>
        <Tab.Pane eventKey={testForExercise} bsPrefix="tab-pane h-100 p-3 w-100">
          Результат тестов
        </Tab.Pane>
        <Tab.Pane eventKey={output} bsPrefix="tab-pane h-100 p-3 w-100">
          Вывод
        </Tab.Pane>
      </Tab.Content>
    </Tab.Container>
  );
};

export default TabsBox;


// const TabsBox = () => {

//   return (
//     <Tab.Container defaultActiveKey="editor" className='card-body'>
//       <Nav variant='tabs' className='justify-content-center'>
//         <Nav.Item>
//           <Nav.Link eventKey="editor">Редактор</Nav.Link>
//         </Nav.Item>
//         <Nav.Item>
//           <Nav.Link eventKey="tests">Тесты</Nav.Link>
//         </Nav.Item>
//         <Nav.Item>
//           <Nav.Link eventKey="output">Вывод</Nav.Link>
//         </Nav.Item>
//       </Nav>
//       <Tab.Content className='h-100 overflow-auto'>
//         <Tab.Pane eventKey="editor" className='h-100'>
//           <Editor />
//         </Tab.Pane>
//         <Tab.Pane eventKey="tests">
//           Результат тестов
//         </Tab.Pane>
//         <Tab.Pane eventKey="output">
//           Вывод
//         </Tab.Pane>
//       </Tab.Content>
//     </Tab.Container>
//   );
// };