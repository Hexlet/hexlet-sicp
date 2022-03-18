import { createSlice, createAsyncThunk } from '@reduxjs/toolkit';
import axios from 'axios';
import routes from '../common/routes.js';

<<<<<<< HEAD
const loadExerciseInfo = createAsyncThunk(
  'loadExerciseInfo',
  async ({ exerciseId }) => {
    const url = routes.exerciseInfoPath(exerciseId);
    const response = await axios.get(url);
    /* eslint-disable camelcase */
    const { prepared_code, test_code, has_tests } = response.data.exercise;
    return {
      preparedCode: prepared_code,
      hasTests: has_tests,
      testCode: test_code,
    };
    /* eslint-enable camelcase */
  },
);
=======
const loadExerciseInfo = createAsyncThunk('loadExerciseInfo', async ({ exerciseId }) => {
  const url = routes.exerciseInfoPath(exerciseId);
  const response = await axios.get(url);
  const { prepared_code, test_code, has_tests } = response.data.exercise;
  return ({
    preparedCode: prepared_code,
    hasTests: has_tests,
    testCode: test_code,
  });
});
>>>>>>> added Tests component

const slice = createSlice({
  name: 'exerciseInfo',
  initialState: {
    loadingState: 'idle',
    preparedCode: '',
    hasTests: false,
    testCode: null,
  },
<<<<<<< HEAD
  reducers: {},
=======
  reducers: {
  },
>>>>>>> added Tests component
  extraReducers: (builder) => {
    builder
      .addCase(loadExerciseInfo.pending, (state) => {
        state.loadingState = 'loading';
      })
<<<<<<< HEAD
      .addCase(loadExerciseInfo.fulfilled, (_state, { payload }) => ({
        loadingState: 'loaded',
        ...payload,
      }))
      .addCase(loadExerciseInfo.rejected, (state) => {
        state.loadingState = 'error';
      });
  },
=======
      .addCase(loadExerciseInfo.fulfilled, (state, { payload }) => {
        state.loadingState = 'loaded';
        state.preparedCode = payload.preparedCode;
        state.hasTests = payload.hasTests;
        state.testCode = payload.testCode;
      })
      .addCase(loadExerciseInfo.rejected, (state) => {
        state.loadingState = 'error';
      })
  }
>>>>>>> added Tests component
});

export const actions = {
  ...slice.actions,
  loadExerciseInfo,
};

export default slice.reducer;
