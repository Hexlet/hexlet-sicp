import { Container, Row, Col } from 'react-bootstrap'
import SettingsLayout from '../../components/Settings/SettingsLayout'
import ProfileForm from '../../components/Settings/ProfileForm'
import ProfileImage from '../../components/Settings/ProfileImage'
import Flash from '../../components/Common/Flash'

const Profile = ({ user, profileImage, flash }) => {
  return (
    <SettingsLayout>
      <Container className="my-4">
        {flash?.message && <Flash type={flash.level} message={flash.message} />}

        <Row>
          <Col md={8}>
            <ProfileForm user={user} />
          </Col>
          <Col md={4}>
            <ProfileImage user={user} profileImage={profileImage} />
          </Col>
        </Row>
      </Container>
    </SettingsLayout>
  )
}

export default Profile
