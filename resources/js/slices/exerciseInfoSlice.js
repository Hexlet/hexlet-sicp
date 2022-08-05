// @ts-check
/* eslint-disable no-param-reassign */

import { createSlice, createAsyncThunk } from '@reduxjs/toolkit';
import axios from 'axios';
import routes from '../common/routes.js';

const loadExerciseInfo = createAsyncThunk(
  'loadExerciseInfo',
  async ({ exerciseId }) => {
    const url = routes.exerciseInfoPath(exerciseId);
    const response = await axios.get(url);
    /* eslint-disable camelcase */
    const { prepared_code, test_code, has_tests, solution_code, has_solution } = response.data.exercise;
    return {
      preparedCode: prepared_code,
      hasTests: has_tests,
      testCode: test_code,
      hasSolution: has_solution,
      solutionCode: solution_code,
    };
    /* eslint-enable camelcase */
  },
);

const slice = createSlice({
  name: 'exerciseInfo',
  initialState: {
    loadingState: 'idle',
    preparedCode: '',
    hasTests: false,
    testCode: null,
    hasSolution: false,
    solutionCode: null,
  },
  reducers: {},
  extraReducers: (builder) => {
    builder
      .addCase(loadExerciseInfo.pending, (state) => {
        state.loadingState = 'loading';
      })
      .addCase(loadExerciseInfo.fulfilled, (_state, { payload }) => ({
        loadingState: 'loaded',
        ...payload,
      }))
      .addCase(loadExerciseInfo.rejected, (state) => {
        state.loadingState = 'error';
      });
  },
});

export const actions = {
  ...slice.actions,
  loadExerciseInfo,
};

export default slice.reducer;
