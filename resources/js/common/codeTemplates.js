export default {
  withoutTemplate: (text) => `#| ${text} |#`,
  withTemplate: (text, code) => `#| BEGIN (${text}) |#\n  ${code}\n#| END |#`,
};
