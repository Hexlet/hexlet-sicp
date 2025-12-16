import { Card } from 'react-bootstrap'
import { useTranslation } from 'react-i18next'

const ProfileImage = ({ profileImage, user }) => {
  const { t } = useTranslation()

  return (
    <Card>
      <Card.Img variant="top" src={profileImage} alt={`${user.name} avatar`} />
      <Card.Body>
        <Card.Text>
          <a href="https://gravatar.com" target="_blank" rel="noopener noreferrer">
            {t('account.go_to_gravatar')}
          </a>
        </Card.Text>
      </Card.Body>
    </Card>
  )
}

export default ProfileImage
