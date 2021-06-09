import { createContext } from 'react';

const ExerciseIdContext = createContext(null);

export const ExerciseIdProvider = ExerciseIdContext.Provider;
export default ExerciseIdContext;
