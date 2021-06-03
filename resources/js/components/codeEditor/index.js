import ReactDOM from 'react-dom';
import initEditor from './app/init.jsx';
// В дальнейшем надо решить в каком виде останеться кастомный css
// и останеться ли вообще. И где его правилно подключать
import './features/editor/style.css';

const runEditor = async () => {
  // some initial setups
  const vdom = await initEditor();
  const container = document.getElementById('codemirrorContainer');
  ReactDOM.render(vdom, container);
};

runEditor();
