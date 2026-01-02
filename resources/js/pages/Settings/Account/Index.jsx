import { Card, Button } from 'react-bootstrap'
import { useForm } from '@inertiajs/react'
import { useTranslation } from 'react-i18next'
import SettingsLayout from '@/components/Settings/SettingsLayout'

const Account = ({ user }) => {
  const { t } = useTranslation()
  const { delete: destroy, processing } = useForm()

  const handleDeleteAccount = (e) => {
    e.preventDefault()
    if (window.confirm(t('account.are_you_sure'))) {
      destroy(`/settings/account/${user.id}`)
    }
  }

  return (
    <SettingsLayout>
      <Card className="mb-2">
        <Card.Body>
          <Card.Title as="h3">{t('account.account')}</Card.Title>
          <Card.Text>
            {t('account.current_email')}: {user.email}
          </Card.Text>
        </Card.Body>
      </Card>

      <Card className="mb-2">
        <Card.Body>
          <Card.Title as="h3">{t('settings.account.password')}</Card.Title>
          <Card.Text>
            <a href="/password/reset">{t('settings.account.reset_password')}</a>
          </Card.Text>
        </Card.Body>
      </Card>

      <Card className="mb-2">
        <Card.Body>
          <Button
            variant="danger"
            onClick={handleDeleteAccount}
            disabled={processing}
          >
            {t('account.delete_account')}
          </Button>
        </Card.Body>
      </Card>
    </SettingsLayout>
  )
}

export default Account
