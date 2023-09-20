import { createRoot } from 'react-dom/client';
import initEditor from './init.jsx';

const USER_ID = window.sicpEditorData.userId;
const EXERCISE_ID = window.sicpEditorData.exerciseId;

const runEditor = async () => {
  const editor = await initEditor(USER_ID, EXERCISE_ID);
  const container = document.getElementById('codemirrorContainer');
  const root = createRoot(container);
  root.render(editor);
};

runEditor();
