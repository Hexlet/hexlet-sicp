import React from 'react';
import TabsBox from './TabsBox.jsx';
import ControlBox from './ControlBox.jsx';

const App = () => (
  <div className="vh-100">
    <div className="card h-75 px-0">
      <TabsBox />
      <ControlBox />
    </div>
  </div>
);

export default App;
