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
        button: "var(--button-bg-colour)",

        /*
          Some colours to play with from various dark themes that we know
          work well, until we can figure out our own colour scheme.
        */

        "discord-bg-1": "var(--discord-channel-list-bg)",
        "discord-bg-2": "var(--discord-channel-list-active-bg)",
        "discord-bg-3": "var(--discord-channel-list-hover-bg)",
        "discord-bg-4": "var(--discord-server-list-hover-bg)",
        "discord-bg-5": "var(--discord-main-content-bg)",
        "discord-bg-6": "var(--discord-text-input-bg)",
        "discord-bg-7": "var(--discord-search-input-bg)",
        "discord-bg-8": "var(--discord-server-popup-item-bg)",
        "discord-bg-9": "var(--discord-server-popup-item-hover-bg)",

        "vscode-bg-1": "var(--vscode-activity-bar-bg)",
        "vscode-bg-2": "var(--vscode-main-content-bg)",
        "vscode-bg-3": "var(--vscode-explorer-bg)",
        "vscode-bg-4": "var(--vscode-explorer-hover-bg)",
        "vscode-bg-5": "var(--vscode-explorer-active-bg)",
        "vscode-bg-6": "var(--vscode-menu-bar-bg)",
        "vscode-bg-7": "var(--vscode-icon-bg)",
        "vscode-bg-8": "var(--vscode-icon-active-bg)"
      }
    }
  },
  variants: {},
  plugins: []
};
