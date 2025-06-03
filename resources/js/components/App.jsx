import React from 'react'
import { Card } from 'react-bootstrap'
import TabsBox from './TabsBox.jsx'
import ControlBox from './ControlBox.jsx'

const App = () => (
  <Card>
    <TabsBox />
    <Card.Footer>
      <ControlBox />
    </Card.Footer>
  </Card>
)

export default App
