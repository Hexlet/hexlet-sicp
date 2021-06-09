import { createContext } from 'react';

const UserIdContext = createContext(null);

export const UserIdProvider = UserIdContext.Provider;
export default UserIdContext;
