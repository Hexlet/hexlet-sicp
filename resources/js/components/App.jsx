import React from 'react';
import { Card } from 'react-bootstrap';
import TabsBox from './TabsBox.jsx';
import ControlBox from './ControlBox.jsx';

const App = () => (
  <div className="vh-100">
    <Card className="h-75">
      <Card.Body className="p-0">
        <TabsBox />
      </Card.Body>
      <Card.Footer>
        <ControlBox />
      </Card.Footer>
    </Card>
  </div>
);

export default App;
