import http from "../http.js";

export default {
  state: {
    theme: {
      current: "dark",
      available: ["dark", "light"]
    },

    nav: {
      isFixed: true
    }
  },

  mutations: {
    setNavFixed: (state, payload) => (state.nav.isFixed = payload),

    setTheme: (state, payload) => (state.theme.current = payload)
  },

  actions: {},

  getters: {}
};
