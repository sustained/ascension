import Vue from "vue";
import Vuex from "vuex";
import VuexPathify from "vuex-pathify";

import rootState from "./state.js";
import user from "./user/state.js";
import course from "./course/state.js";
import courses from "./courses/state.js";

Vue.use(Vuex);

const store = new Vuex.Store({
  ...rootState,

  modules: {
    user,
    course,
    courses
  },

  plugins: [VuexPathify.plugin]
});

export default store;
