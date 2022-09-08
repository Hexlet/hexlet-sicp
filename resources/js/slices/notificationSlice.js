// @ts-check
/* eslint-disable no-param-reassign */

import { createSlice } from '@reduxjs/toolkit';
import { handleNewCheckResult } from './checkResultSlice';

const slice = createSlice({
  name: 'notification',
  initialState: {
    show: false,
    style: 'success',
    content: null,
  },
  reducers: {
    showNotification(state, { payload: { content, style } }) {
      state.show = true;
      state.content = content;
      state.style = style;
    },
    hideNotification(state) {
      state.show = false;
    },
  },
  extraReducers: (builder) => {
    builder
      .addCase(handleNewCheckResult, (state) => {
        state.show = false;
      });
  },
});

export const { showNotification, hideNotification } = slice.actions;

export default slice.reducer;
