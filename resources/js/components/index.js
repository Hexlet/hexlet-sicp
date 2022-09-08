import ReactDOM from 'react-dom';
import initEditor from './init.jsx';

const USER_ID = window.sicpEditorData.userId;
const EXERCISE_ID = window.sicpEditorData.exerciseId;

const runEditor = async () => {
  const vdom = await initEditor(USER_ID, EXERCISE_ID);
  const container = document.getElementById('codemirrorContainer');
  ReactDOM.render(vdom, container);
};

runEditor();
