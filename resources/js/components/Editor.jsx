import { Spinner } from 'react-bootstrap'
import { useSelector } from 'react-redux'
import { useTranslation } from 'react-i18next'

import EditorBuilder from './EditorBuilder.jsx'

const Editor = () => {
  const { loadingState } = useSelector((state) => state.exerciseInfo)
  const { t } = useTranslation()

  return loadingState === 'loading'
    ? (
        <div className="d-flex h-100 justify-content-center align-items-center">
          <Spinner animation="border" role="status" variant="primary">
            <span className="visually-hidden">{t('loading')}</span>
          </Spinner>
        </div>
      )
    : (
        <EditorBuilder />
      )
}

export default Editor
