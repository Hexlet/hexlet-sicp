import { Provider } from 'react-redux'
import i18n from 'i18next'
import { I18nextProvider, initReactI18next } from 'react-i18next'
import resources from '../locales/index.js'
import App from './App.jsx'
import createStore from './store.js'
import { UserIdProvider } from '../context/UserIdContext.js'
import { ExerciseIdProvider } from '../context/ExerciseIdContext.js'
import { actions } from '../slices/exerciseInfoSlice.js'

const SicpEditor = async (userId, exerciseId) => {
  const { locale: lng } = window.sicpEditorData
  const store = createStore()
  store.dispatch(actions.loadExerciseInfo({ exerciseId }))
  const i18nInstance = i18n.createInstance()
  await i18nInstance
    .use(initReactI18next)
    .init({
      lng,
      resources,
      interpolation: {
        escapeValue: false,
      },
    })

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
  )
}

export default SicpEditor
