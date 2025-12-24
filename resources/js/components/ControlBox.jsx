import { useContext, useState } from 'react'
import {
  Button, OverlayTrigger, Tooltip, Spinner,
} from 'react-bootstrap'
import { useDispatch, useSelector } from 'react-redux'
import axios from 'axios'
import { useTranslation } from 'react-i18next'
import UserIdContext from '../context/UserIdContext'
import ExerciseIdContext from '../context/ExerciseIdContext.js'
import routes from '../common/routes.js'
import { handleNewCheckResult } from '../slices/checkResultSlice'
import { showNotification } from '../slices/notificationSlice'

const ControlBox = () => {
  const { t } = useTranslation()
  const editor = useSelector((state) => state.editor)
  const userId = useContext(UserIdContext)
  const exerciseId = useContext(ExerciseIdContext)
  const [isSending, setIsSending] = useState(false)
  const [isSaving, setIsSaving] = useState(false)
  const dispatch = useDispatch()

  const runCheck = async () => {
    setIsSending(true)
    const url = routes.runCheckPath(exerciseId)
    const data = {
      user_id: userId,
      solution_code: editor.content,
    }
    try {
      const response = await axios.post(url, data)
      const {
        exit_code: exitCode,
        output,
        result_status: resultStatus,
      } = response.data.check_result

      const newCheckResult = {
        exitCode,
        resultStatus,
        output,
      }
      dispatch(handleNewCheckResult(newCheckResult))
    }
    catch (error) {
      console.log(error.message)
    }
    finally {
      setIsSending(false)
    }
  }

  const saveSolution = async () => {
    setIsSaving(true)
    const url = routes.saveSolutionPath(exerciseId)
    const data = {
      user_id: userId,
      solution_code: editor.content,
    }
    try {
      const response = await axios.post(url, data)
      const { protocol, host } = document.location
      const message = `${t('solution.saved')}: ${protocol}//${host}/solutions/${response.data.save_result.id}`
      dispatch(showNotification({ style: 'success', content: message }))
    }
    catch {
      const message = t('solution.saveFailed')
      dispatch(showNotification({ style: 'danger', content: message }))
    }
    finally {
      setIsSaving(false)
    }
  }

  const isEditorEmpty = (editorInstance) => !editorInstance.content.trim()

  const renderSaveButton = () => {
    const isDisabled = () => isSaving || isEditorEmpty(editor) || !userId
    const tooltip = !userId ? t('tooltip.loginRequired') : t('tooltip.impossible')
    return isDisabled()
      ? (
          <OverlayTrigger overlay={<Tooltip id="tooltip-disabled">{tooltip}</Tooltip>}>
            <span className="d-inline-block">
              <Button
                variant="success"
                style={{ pointerEvents: 'none' }}
                disabled
              >
                {isSaving ? <Spinner animation="border" role="status" variant="light" size="sm" /> : t('save')}
              </Button>
            </span>
          </OverlayTrigger>
        )
      : (
          <Button
            variant="success"
            onClick={saveSolution}
          >
            {t('save')}
          </Button>
        )
  }

  return (
    <div className="d-flex justify-content-between">
      {renderSaveButton()}
      <Button
        variant="primary"
        onClick={runCheck}
        disabled={isSending || isEditorEmpty(editor)}
      >
        {isSending ? <Spinner animation="border" role="status" variant="light" size="sm" /> : t('run')}
      </Button>
    </div>
  )
}

export default ControlBox
