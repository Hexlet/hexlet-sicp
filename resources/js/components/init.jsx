import React from 'react';
import { Provider } from 'react-redux';
import i18n from 'i18next';
import { I18nextProvider, initReactI18next } from 'react-i18next';
import resources from '../locales/index.js';
import App from './App.jsx';
import createStore from './store.js';
import { UserIdProvider } from '../context/UserIdContext.js';
import { ExerciseIdProvider } from '../context/ExerciseIdContext.js';

export default async (userId, exerciseId) => {
  const store = createStore();
  const i18nInstance = i18n.createInstance();
  await i18nInstance
    .use(initReactI18next)
    .init({
      lng: 'ru', // В будущем это должно меняться по клику выбор языка
      resources,
      keySeparator: false,
      interpolation: {
        escapeValue: false,
      },
    });

  return (
    <Provider store={store}>
      <I18nextProvider i18n={i18nInstance}>
        <UserIdProvider value={userId}>
          <ExerciseIdProvider value={exerciseId}>
            <App />
          </ExerciseIdProvider>
        </UserIdProvider>
      </I18nextProvider>
    </Provider>
  );
};
