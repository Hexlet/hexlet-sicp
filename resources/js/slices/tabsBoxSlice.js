// @ts-check

import { createSlice } from '@reduxjs/toolkit'
import tabNames from '../common/tabNamesMap.js'
import { handleNewCheckResult } from './checkResultSlice.js'
import { showNotification } from './notificationSlice.js'

const slice = createSlice({
  name: 'tabsBox',
  initialState: {
    currentTab: tabNames.editor,
  },
  reducers: {
    changeTab(state, { payload: { newActiveTab } }) {
      state.currentTab = newActiveTab
    },
  },
  extraReducers: (builder) => {
    builder
      .addCase(handleNewCheckResult, (state) => {
        state.currentTab = tabNames.output
      })
      .addCase(showNotification, (state) => {
        state.currentTab = tabNames.output
      })
  },
})

export const { changeTab } = slice.actions

export default slice.reducer
