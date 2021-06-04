import { createSlice } from '@reduxjs/toolkit';
import { changeTab } from '../tabsBox/tabsBoxSlice.js';

const initialContent = `#lang racket

#| BEGIN (write your solution here) |#
(displayln "Hello, World!")
  
#| END |#
`;

const slice = createSlice({
  name: 'editor',
  initialState: {
    content: initialContent,
    focusesCount: 1,
  },
  reducers: {
    changeContent(state, { payload: { content } }) {
      state.content = content;
    },
  },
  extraReducers: (builder) => {
    builder
      .addCase(changeTab, (state, { payload: { newActiveTab } }) => {
        if (newActiveTab === 'editor') {
          state.focusesCount += 1;
        }
      });
  },
});

export const { changeContent } = slice.actions;

export default slice.reducer;