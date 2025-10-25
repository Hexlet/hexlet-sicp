import React, { useEffect, useState } from 'react'
import { useSelector } from 'react-redux'
import Countdown from 'react-countdown'
import { format } from 'date-fns'
import { Light as Highlight } from 'react-syntax-highlighter'
import { vs, monokaiSublime } from 'react-syntax-highlighter/dist/esm/styles/hljs'
import { useTranslation } from 'react-i18next'

import waitingClock from '../../assets/images/waiting_clock.png'
import theme from '../common/currentTheme'

const TeacherSolution = () => {
  const { t } = useTranslation()
  const { hasTeacherSolution, teacherSolutionCode } = useSelector(state => state.exerciseInfo)
  const checkedSolutionStatus = useSelector(state => state.checkResult.resultStatus)

  const [isShown, setIsShown] = useState(false)
  const [startTime, setStartTime] = useState(null)

  useEffect(() => {
    setStartTime(Date.now())
  }, [])

  const waitingTime = 1200000

  const renderShowButton = () => (
    <>
      <p>{t('solutionNotice')}</p>
      <div className="text-center">
        <button
          type="button"
          className="btn btn-secondary px-4"
          onClick={() => setIsShown(true)}
        >
          {t('showSolution')}
        </button>
      </div>
    </>
  )

  const renderCountdown = (countdownData) => {
    const { completed } = countdownData

    if (completed || checkedSolutionStatus === 'success') {
      return renderShowButton()
    }

    const remainingTime = format(new Date(countdownData.total), 'mm:ss')

    return (
      <div className="text-center">
        <p className="lead">{t('solutionInstructions')}</p>
        <div className="display-4">{ remainingTime }</div>
        <img className="img-fluid px-5" src={waitingClock} alt="waiting_clock" />
      </div>
    )
  }

  const renderShowSolution = () => (isShown
    ? (
        <div className="d-flex h-100">
          <Highlight
            className="h-100 w-100"
            language="scheme"
            style={theme === 'dark' ? monokaiSublime : vs}
            showLineNumbers
          >
            {teacherSolutionCode}
          </Highlight>
        </div>
      )
    : (
        <div className="p-3">
          <Countdown date={startTime + waitingTime} renderer={renderCountdown} />
        </div>
      ))

  return hasTeacherSolution ? renderShowSolution() : null
}

export default TeacherSolution
