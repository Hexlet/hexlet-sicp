// @ts-check

import { createSlice } from '@reduxjs/toolkit'
import checkStatusMap from '../common/checkStatusMap.js'

const slice = createSlice({
  name: 'checkResult',
  initialState: {
    exitCode: null,
    resultStatus: checkStatusMap.idle,
    output: 'Default output response from server after solution check',
  },
  reducers: {
    handleNewCheckResult(state, { payload: { exitCode, resultStatus, output } }) {
      state.exitCode = exitCode
      state.resultStatus = checkStatusMap[resultStatus]
      state.output = output
    },
  },
})

export const { handleNewCheckResult } = slice.actions

export default slice.reducer
