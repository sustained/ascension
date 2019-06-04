import Vue from "vue";
import Vuex from "vuex";

import rootState from "./state.js";
import course from "./course/state.js";
import courses from "./courses/state.js";

Vue.use(Vuex);

const store = new Vuex.Store({
  ...rootState,

  modules: {
    course,
    courses
  }
});

export default store;
