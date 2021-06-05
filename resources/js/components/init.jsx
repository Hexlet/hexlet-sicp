import React from 'react';
import { Provider } from 'react-redux';
import App from './App.jsx';
import createStore from './store.js';

export default async () => {
  const store = createStore();

  return (
    <Provider store={store}>
      <App />
    </Provider>
  );
};
