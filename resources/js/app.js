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

import router from "./router/router.js";
import store from "./store/store.js";

const app = new Vue({
  store,
  router,
  el: "#app"
});
