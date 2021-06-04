import { createSlice } from '@reduxjs/toolkit';
import tabNames from '../common/tabNamesMap.js';

const slice = createSlice({
  name: 'tabsBox',
  initialState: {
    currentTab: tabNames.editor,
  },
  reducers: {
    changeTab(state, { payload: { newActiveTab } }) {
      state.currentTab = newActiveTab;
    },
  }
});

export const { changeTab } = slice.actions;

export default slice.reducer;
