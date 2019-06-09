const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
  theme: {
    extend: {
      textColor: {
        default: "var(--text-default-colour)"
      },

      backgroundColor: {
        header: "var(--header-bg-colour)",
        container: "var(--container-bg-colour)",
        button: "var(--button-bg-colour)"
      }
    }
  },
  variants: {},
  plugins: []
};
