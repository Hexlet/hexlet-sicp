import { Card, Button, Alert, Badge } from 'react-bootstrap'
import { useForm } from '@inertiajs/react'
import { useTranslation } from 'react-i18next'
import { formatDistanceToNow } from 'date-fns'
import { ru, enUS } from 'date-fns/locale'
import SettingsLayout from '@/components/Settings/SettingsLayout'
import { useRoute } from '@/utils/route'

const Github = ({ user, repository, processingStates }) => {
  const { t, i18n } = useTranslation()
  const { post, delete: destroy, processing: isSubmitting } = useForm()
  const route = useRoute()

  const formatDate = (dateString) => {
    if (!dateString) return null
    const dateLocale = i18n.language === 'ru' ? ru : enUS
    return formatDistanceToNow(new Date(dateString), {
      addSuffix: true,
      locale: dateLocale,
    })
  }

  const isProcessing = () => {
    if (!repository || !repository.state) return false
    return processingStates.includes(repository.state)
  }
  const handleCreateRepository = (e) => {
    e.preventDefault()
    post(route('/settings/github'))
  }

  const handleSync = (e) => {
    e.preventDefault()
    post(route('/settings/github/sync'))
  }

  const handleDelete = (e) => {
    e.preventDefault()
    if (window.confirm(t('account.github.confirm_delete'))) {
      destroy(route(`/settings/github/${repository.id}`))
    }
  }

  const getStatusBadge = (status) => {
    if (!status) {
      return null
    }
    const statusMap = {
      active: { variant: 'success', text: t('account.github.status_active') },
      error: { variant: 'danger', text: t('account.github.status_error') },
    }
    const statusInfo = statusMap[status] || statusMap.error
    return (
      <Badge bg={statusInfo.variant}>{statusInfo.text}</Badge>
    )
  }

  return (
    <SettingsLayout>
      <Card className="mb-3">
        <Card.Body>
          <Card.Title as="h3">{t('account.github.title')}</Card.Title>
          <Card.Text className="text-muted">
            {t('account.github.description')}
          </Card.Text>
        </Card.Body>
      </Card>

      {!user.has_github_token
        ? (
            <Card className="mb-3">
              <Card.Body>
                <Alert variant="warning">
                  <i className="fas fa-exclamation-triangle"></i>{' '}
                  {t('account.github.not_authorized')}
                </Alert>
                <a href={route('/oauth/github')} className="btn btn-dark">
                  <i className="fab fa-github"></i> {t('account.github.connect_github')}
                </a>
              </Card.Body>
            </Card>
          )
        : !repository
            ? (
                <Card className="mb-3">
                  <Card.Body>
                    <Alert variant="info">
                      <i className="fas fa-info-circle"></i>{' '}
                      {t('account.github.not_configured')}
                    </Alert>
                    <Card.Text>{t('account.github.setup_description')}</Card.Text>
                    <Button
                      variant="primary"
                      onClick={handleCreateRepository}
                      disabled={isSubmitting}
                    >
                      <i className="fas fa-plus"></i> {t('account.github.create_repository')}
                    </Button>
                  </Card.Body>
                </Card>
              )
            : (
                <>
                  <Card className="mb-3">
                    <Card.Body>
                      <Card.Title as="h4">{t('account.github.repository_status')}</Card.Title>

                      {repository.status && (
                        <div className="mb-3">
                          <strong>{t('account.github.status')}:</strong>
                          {' '}
                          {getStatusBadge(repository.status)}
                        </div>
                      )}

                      {repository.state && (
                        <div className="mb-3">
                          <strong>{t('account.github.current_step')}:</strong>{' '}
                          <Badge bg="info">{t(`account.github.state.${repository.state}`)}</Badge>
                        </div>
                      )}

                      <div className="mb-3">
                        <strong>{t('account.github.repository_name')}:</strong>{' '}
                        <a
                          href={repository.url}
                          target="_blank"
                          rel="noopener noreferrer"
                        >
                          {repository.full_name}{' '}
                          <i className="fas fa-external-link-alt fa-sm"></i>
                        </a>
                      </div>

                      {repository.last_sync_at && (
                        <div className="mb-3">
                          <strong>{t('account.github.last_sync')}:</strong>{' '}
                          {formatDate(repository.last_sync_at)}
                        </div>
                      )}

                      {repository.last_error && user.is_admin && (
                        <Alert variant="danger">
                          <strong>{t('account.github.last_error')}:</strong>{' '}
                          {repository.last_error}
                        </Alert>
                      )}
                    </Card.Body>
                  </Card>

                  <Card className="mb-3">
                    <Card.Body>
                      <Card.Title as="h4">{t('account.github.actions')}</Card.Title>

                      {isProcessing() && (
                        <Alert variant="info" className="mb-3">
                          <i className="fas fa-spinner fa-spin"></i>{' '}
                          {t('account.github.processing')}
                        </Alert>
                      )}

                      <Button
                        variant="primary"
                        onClick={handleSync}
                        disabled={isSubmitting || !repository.status || isProcessing()}
                        className="me-2 mb-2"
                      >
                        <i className="fas fa-sync"></i> {t('account.github.sync_solutions')}
                      </Button>

                      <Button
                        variant="danger"
                        onClick={handleDelete}
                        disabled={isSubmitting || isProcessing()}
                        className="mb-2"
                      >
                        <i className="fas fa-trash"></i> {t('account.github.delete_integration')}
                      </Button>
                    </Card.Body>
                  </Card>

                  <Card className="mb-3">
                    <Card.Body>
                      <Card.Title as="h4">{t('account.github.how_it_works')}</Card.Title>
                      <ul className="mb-0">
                        <li>{t('account.github.instruction_1')}</li>
                        <li>{t('account.github.instruction_2')}</li>
                        <li>{t('account.github.instruction_3')}</li>
                        <li>{t('account.github.instruction_4')}</li>
                      </ul>
                    </Card.Body>
                  </Card>
                </>
              )}
    </SettingsLayout>
  )
}

export default Github
