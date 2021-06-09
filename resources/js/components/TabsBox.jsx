import React from 'react';
import { Nav, Tab } from 'react-bootstrap';
import { useDispatch, useSelector } from 'react-redux';
import Editor from './Editor.jsx';
import tabNames from '../common/tabNamesMap.js';
import { changeTab } from '../slices/tabsBoxSlice.js';

const TabsBox = () => {
  const { currentTab } = useSelector((state) => state.tabsBox);
  const { checkResult } = useSelector((state) => state);
  const dispatch = useDispatch();

  const changeActiveTab = (newActiveTab) => {
    dispatch(changeTab({ newActiveTab }));
  };

  return (
    <Tab.Container activeKey={currentTab} onSelect={changeActiveTab} className="card-body">
      <Nav variant="tabs" className="justify-content-center">
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
      <Tab.Content className="h-100 overflow-auto">
        <Tab.Pane eventKey={tabNames.editor} bsPrefix="tab-pane h-100 w-100">
          <Editor />
        </Tab.Pane>
        <Tab.Pane eventKey={tabNames.outputTab} bsPrefix="tab-pane h-100 p-3 w-100">
          {checkResult.output}
        </Tab.Pane>
        <Tab.Pane eventKey={tabNames.testForExercise} bsPrefix="tab-pane h-100 p-3 w-100">
          Результат тестов
        </Tab.Pane>
      </Tab.Content>
    </Tab.Container>
  );
};

export default TabsBox;
