// require("./bootstrap");

import Vue from "vue";

const files = require.context("./components/base", true, /\w+\.(vue|js)$/i);

files.keys().map(key => {
  Vue.component(
    key
      .split("/")
      .pop()
      .split(".")[0]
      .replace("Base", "Ascension"),
    files(key).default
  );
});

import http from "./http.js";
import router from "./router/router.js";
import store from "./store/store.js";

window.axios = http;

import { get } from "vuex-pathify";

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
    },

    logoutUser() {
      this.$store.dispatch("user/logout").then(() => {
        this.$router.push("/");
      });
    }
  },

  computed: {
    themeClass() {
      return `theme-${this.currentTheme}`;
    },
    loggedIn: get("user/isLoggedIn")
  }
});

export default app;
