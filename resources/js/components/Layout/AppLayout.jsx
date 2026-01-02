import { usePage } from '@inertiajs/react'
import Flash from '@/components/Common/Flash'

const AppLayout = ({ children }) => {
  const { flash } = usePage().props

  return (
    <>
      {flash && <Flash type={flash.level} message={flash.message} />}
      {children}
    </>
  )
}

export default AppLayout
