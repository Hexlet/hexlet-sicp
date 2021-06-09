const host = '';
const prefix = 'api';

export default {
  runCheckPath: (exerciseId) => [host, prefix, 'exercises', exerciseId, 'check'].join('/'),
};
