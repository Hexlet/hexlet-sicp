const host = ''
const prefix = 'api'

export default {
  runCheckPath: exerciseId => [host, prefix, 'exercises', exerciseId, 'check'].join('/'),
  exerciseInfoPath: exerciseId => [host, prefix, 'exercises', exerciseId].join('/'),
  saveSolutionPath: exerciseId => [host, prefix, 'exercises', exerciseId, 'solutions'].join('/'),
}
