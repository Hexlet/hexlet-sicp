import React from 'react';
import App from './App.jsx';
import createStore from './store.js';
import { Provider } from 'react-redux';

export default async () => {
  const store = createStore();

  return (
    <Provider store={store}>
      <App />
    </Provider>
  );
};
