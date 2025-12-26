import { Row, Col, Card } from 'react-bootstrap'
import { Link, usePage } from '@inertiajs/react'
import { useTranslation } from 'react-i18next'

const SettingsLayout = ({ children }) => {
  const { t } = useTranslation()
  const { url } = usePage()

  return (
    <div className="container p-0">
      <Row className="my-4">
        <Col md={3} className="mb-2">
          <Card className="shadow-sm">
            <Card.Header className="fw-bold text-muted">
              {t('account.settings')}
            </Card.Header>
            <div className="list-group list-group-flush">
              <Link
                href="/settings/profile"
                className={`list-group-item list-group-item-action ${
                  url?.includes('profile') ? 'active' : ''
                }`}
              >
                {t('account.profile')}
              </Link>
              <Link
                href="/settings/account"
                className={`list-group-item list-group-item-action ${
                  url?.includes('account') && !url?.includes('profile') ? 'active' : ''
                }`}
              >
                {t('account.account')}
              </Link>
              <Link
                href="/settings/github"
                className={`list-group-item list-group-item-action ${
                  url?.includes('github') ? 'active' : ''
                }`}
              >
                {t('account.github_integration')}
              </Link>
            </div>
          </Card>
        </Col>
        <Col md={9}>
          {children}
        </Col>
      </Row>
    </div>
  )
}

export default SettingsLayout
