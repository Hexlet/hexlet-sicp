import { configureStore } from '@reduxjs/toolkit';
import editorReducer from '../features/editor/editorSlice.js';
import tabsBoxReducer from '../features/tabsBox/tabsBoxSlice.js'

// Так как codeEditor это по сути подпрограмма,
// то врядли у него будет сложный по форме стейт
// Если да, то см. доку redux так как возможно 
// store можно описать проще 

export default () => {
  const store = configureStore({
    reducer: {
      editor: editorReducer,
      tabsBox: tabsBoxReducer,
    }
  });

  return store;
};
