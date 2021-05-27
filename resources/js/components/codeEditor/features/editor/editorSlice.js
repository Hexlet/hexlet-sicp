import { createSlice } from '@reduxjs/toolkit';

const initialContent = `#lang racket

#| BEGIN (write your solution here) |#
(displayln "Hello, World!")
  
#| END |#
`;

const slice = createSlice({
  name: 'editor',
  initialState: {
    content: initialContent,
  },
  reducers: {
    changeContent(state, { payload: { content } }) {
      state.content = content;
    },
  }
});

export const { changeContent } = slice.actions;

export default slice.reducer;
