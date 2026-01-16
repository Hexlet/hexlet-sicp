import { usePage } from '@inertiajs/react'

export const useRoute = () => {
  const { locale } = usePage().props

  return (path) => {
    const cleanPath = path.startsWith('/') ? path : `/${path}`
    return `/${locale}${cleanPath}`
  }
}
