import { configureStore } from '@reduxjs/toolkit';
import editorReducer from '../slices/editorSlice.js';
import tabsBoxReducer from '../slices/tabsBoxSlice.js';
import checkResultReducer from '../slices/checkResultSlice.js';
import solutionReducer from '../slices/solutionSlice.js';
import exerciseInfoReducer from '../slices/exerciseInfoSlice.js';
import notificationReducer from '../slices/notificationSlice.js';

export default () => {
  const store = configureStore({
    reducer: {
      editor: editorReducer,
      tabsBox: tabsBoxReducer,
      checkResult: checkResultReducer,
      showSolution: solutionReducer,
      exerciseInfo: exerciseInfoReducer,
      notification: notificationReducer,
    },
  });

  return store;
};
