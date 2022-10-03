export default {
  withoutTemplate: (text) => `#| ${text} |#\n`,
  withTemplate: (text, code) => `#| BEGIN (${text}) |#\n${code}\n#| END |#`,
};
