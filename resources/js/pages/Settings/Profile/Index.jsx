import { Row, Col } from 'react-bootstrap'
import SettingsLayout from '@/components/Settings/SettingsLayout'
import ProfileForm from '@/components/Settings/ProfileForm'
import ProfileImage from '@/components/Settings/ProfileImage'

const Profile = ({ user, profileImage }) => {
  return (
    <SettingsLayout>
      <Row>
        <Col md={8}>
          <ProfileForm user={user} />
        </Col>
        <Col md={4}>
          <ProfileImage user={user} profileImage={profileImage} />
        </Col>
      </Row>
    </SettingsLayout>
  )
}

export default Profile
