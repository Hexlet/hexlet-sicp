/* eslint-disable no-param-reassign */

/*  TODO: issue https://github.com/Hexlet/hexlet-sicp/issues/1526
    Упростить логику, убрав стейт из редакса и сделав локальный стейт в Teacher's Solution!
*/
import { createSlice } from '@reduxjs/toolkit';
import { handleNewCheckResult } from './checkResultSlice';

const solutionSlice = createSlice({
  name: 'showSolution',
  initialState: {
    startTime: Date.now(),
    waitingTime: 1200000,
    displaySolutionState: 'notShown',
  },
  reducers: {
    setStartTime(state, { payload }) {
      state.startTime = payload.startTime;
    },
    changeShowStatus(state, { payload }) {
      state.displaySolutionState = payload;
    },
  },
  extraReducers: (builder) => {
    builder.addCase(handleNewCheckResult, (state, action) => {
      const { resultStatus } = action.payload;
      console.log(resultStatus);
      if (resultStatus === 'success') {
        state.displaySolutionState = 'isShown';
      }
    });
  },
});

export const { setStartTime, changeShowStatus } = solutionSlice.actions;
export default solutionSlice.reducer;
