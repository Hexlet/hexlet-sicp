import { Card, Button, Alert, Badge } from 'react-bootstrap'
import { useForm } from '@inertiajs/react'
import { useTranslation } from 'react-i18next'
import { formatDistanceToNow } from 'date-fns'
import { ru, enUS } from 'date-fns/locale'
import SettingsLayout from '@/components/Settings/SettingsLayout'

const Github = ({ user, repository }) => {
  const { t, i18n } = useTranslation()
  const { post, delete: destroy, processing } = useForm()

  const formatDate = (dateString) => {
    if (!dateString) return null
    const locale = i18n.language === 'ru' ? ru : enUS
    return formatDistanceToNow(new Date(dateString), {
      addSuffix: true,
      locale,
    })
  }
  const handleCreateRepository = (e) => {
    e.preventDefault()
    post('/settings/github')
  }

  const handleSync = (e) => {
    e.preventDefault()
    post('/settings/github/sync')
  }

  const handleDelete = (e) => {
    e.preventDefault()
    if (window.confirm(t('account.github.confirm_delete'))) {
      destroy(`/settings/github/${repository.id}`)
    }
  }

  const getStatusBadge = (status) => {
    const statusMap = {
      active: { variant: 'success', text: t('account.github.status_active') },
      pending: { variant: 'warning', text: t('account.github.status_pending') },
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
                <a href="/oauth/github" className="btn btn-dark">
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
                      disabled={processing}
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

                      <div className="mb-3">
                        <strong>{t('account.github.status')}:</strong>
                        {' '}
                        {getStatusBadge(repository.status)}
                      </div>

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

                      {repository.last_error && (
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

                      <Button
                        variant="primary"
                        onClick={handleSync}
                        disabled={processing || repository.status !== 'active'}
                        className="me-2 mb-2"
                      >
                        <i className="fas fa-sync"></i> {t('account.github.sync_solutions')}
                      </Button>

                      <Button
                        variant="danger"
                        onClick={handleDelete}
                        disabled={processing}
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
