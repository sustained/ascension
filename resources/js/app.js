// require("./bootstrap");

import Vue from "vue";

const files = require.context("./components", true, /Base[A-Z]\w+\.(vue|js)$/i);

files.keys().map(key => {
  Vue.component(
    key
      .split("/")
      .pop()
      .split(".")[0],
    files(key).default
  );
});

import http from "./http.js";
import router from "./router/router.js";
import store from "./store/store.js";

window.axios = http;

const app = new Vue({
  store,
  router,
  el: "#app",

  data: {
    currentTheme: "dark"
  },

  methods: {
    toggleTheme() {
      if (this.currentTheme === "dark") this.currentTheme = "light";
      else this.currentTheme = "dark";
    }
  },

  computed: {
    themeClass() {
      return `theme-${this.currentTheme}`;
    }
  }
});
