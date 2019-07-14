import Vue from "vue";
import Vuex from "vuex";
import VuexPathify from "vuex-pathify";
import VuexPersistence from "vuex-persist";

import rootState from "./state.js";
import user from "./user/state.js";
import course from "./course/state.js";
import courses from "./courses/state.js";

const VuexLocal = new VuexPersistence({
  storage: window.localStorage,
  modules: ["state", "user"],
  filter: mutation => {
    console.log(mutation.type, !["user/setState", "user/setError"].includes(mutation.type));
    return !["user/setState", "user/setError"].includes(mutation.type);
  }
});

Vue.use(Vuex);

const store = new Vuex.Store({
  ...rootState,

  modules: {
    user,
    course,
    courses
  },

  plugins: [VuexPathify.plugin, VuexLocal.plugin]
});

export default store;
