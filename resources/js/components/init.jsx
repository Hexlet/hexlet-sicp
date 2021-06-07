import React from 'react';
import { Provider } from 'react-redux';
import App from './App.jsx';
import createStore from './store.js';
import { UserIdProvider } from '../context/UserIdContext.js';
import { ExerciseIdProvider } from '../context/ExerciseIdContext.js';

export default async (userId, exerciseId) => {
  const store = createStore();

  return (
    <Provider store={store}>
      <UserIdProvider value={userId}>
        <ExerciseIdProvider value={exerciseId}>
          <App />
        </ExerciseIdProvider>
      </UserIdProvider>
    </Provider>
  );
};
