import React from 'react';
import ReactDOM from 'react-dom';
import EditorApp from './Editor/App.jsx';
import './Editor/style.css';


if (document.getElementById('codemirrorContainer')) {
	ReactDOM.render(<EditorApp />, document.getElementById('codemirrorContainer'));
}
