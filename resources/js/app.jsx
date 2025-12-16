import { createRoot } from 'react-dom/client'
import { createInertiaApp } from '@inertiajs/react'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { I18nextProvider } from 'react-i18next'
import i18n from './i18n'

const appName = document.getElementsByTagName('title')[0]?.innerText || 'Hexlet SICP'

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => resolvePageComponent(
    `./pages/${name}.jsx`,
    import.meta.glob('./pages/**/*.jsx', { eager: true }),
  ),
  setup({ el, App, props }) {
    createRoot(el).render(
      <I18nextProvider i18n={i18n}>
        <App {...props} />
      </I18nextProvider>
    )
  },
  progress: {
    color: '#4B5563',
  },
})
