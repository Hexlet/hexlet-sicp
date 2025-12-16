import { Card, Form, Button } from 'react-bootstrap'
import { useForm } from '@inertiajs/react'
import { useTranslation } from 'react-i18next'

const ProfileForm = ({ user }) => {
  const { t } = useTranslation()
  const { data, setData, patch, processing, errors } = useForm({
    name: user.name || '',
    github_name: user.github_name || '',
  })

  const handleChange = (e) => {
    setData(e.target.name, e.target.value)
  }

  const handleSubmit = (e) => {
    e.preventDefault()
    patch(`/settings/profile/${user.id}`, {
      preserveScroll: true,
    })
  }

  return (
    <Card className="mb-2">
      <Card.Body>
        <Card.Title className="h3">
          {t('account.profile')} {user.email}
        </Card.Title>

        <Form onSubmit={handleSubmit}>
          <Form.Group className="mb-3">
            <Form.Label>{t('settings.profile.name')}</Form.Label>
            <Form.Control
              type="text"
              name="name"
              value={data.name}
              onChange={handleChange}
              isInvalid={!!errors.name}
            />
            {errors.name && (
              <Form.Control.Feedback type="invalid">
                {errors.name}
              </Form.Control.Feedback>
            )}
          </Form.Group>

          <Form.Group className="mb-3">
            <Form.Label>{t('settings.profile.github_name')}</Form.Label>
            <Form.Control
              type="text"
              name="github_name"
              value={data.github_name}
              onChange={handleChange}
              isInvalid={!!errors.github_name}
            />
            {errors.github_name && (
              <Form.Control.Feedback type="invalid">
                {errors.github_name}
              </Form.Control.Feedback>
            )}
          </Form.Group>

          <Button
            variant="primary"
            type="submit"
            disabled={processing}
          >
            {processing ? t('loading') : t('layout.save')}
          </Button>
        </Form>
      </Card.Body>
    </Card>
  )
}

export default ProfileForm
