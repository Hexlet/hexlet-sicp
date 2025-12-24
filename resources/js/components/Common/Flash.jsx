import { useState, useEffect } from 'react'
import { Alert } from 'react-bootstrap'

const Flash = ({ type = 'info', message }) => {
  const [show, setShow] = useState(true)

  useEffect(() => {
    const timer = setTimeout(() => setShow(false), 5000)
    return () => clearTimeout(timer)
  }, [])

  if (!show || !message) return null

  const variantMap = {
    success: 'success',
    error: 'danger',
    warning: 'warning',
    info: 'info',
  }

  return (
    <Alert
      variant={variantMap[type] || 'info'}
      onClose={() => setShow(false)}
      dismissible
      className="mb-3"
    >
      {message}
    </Alert>
  )
}

export default Flash
