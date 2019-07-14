import axios from "axios";

import { loginUser, logoutUser, getUser, registerUser, getToken, setToken, clearToken } from "../../api/auth.js";

const token = getToken();

export default {
  namespaced: true,

  state: {
    id: null,
    name: null,
    email: null,
    loggedIn: false,
    error: null,
    state: "idle"
  },

  getters: {
    isLoading(state) {
      return state.state === "loading";
    },

    shouldShowError(state) {
      return state.state === "failure" && state.error !== null;
    },

    isLoggedIn(state) {
      return state.loggedIn;
    }
  },

  mutations: {
    setState: (state, payload) => (state.state = payload),

    setError: (state, payload) => (state.error = payload),

    setLoggedIn: (state, payload) => (state.loggedIn = payload),

    setToken: (state, payload) => setToken(payload),

    setId: (state, payload) => (state.id = payload),

    setName: (state, payload) => (state.name = payload),

    setEmail: (state, payload) => (state.email = payload)
  },

  actions: {
    get() {
      return getUser()
        .catch(error => Promise.reject(error))
        .then(user => user);
    },

    login({ commit, dispatch }, payload) {
      commit("setState", "loading");

      return loginUser(payload)
        .catch(error => {
          dispatch("loginFailure", error);

          return Promise.reject(error);
        })
        .then(result => {
          return dispatch("loginSuccess", result);
        });
    },

    loginSuccess({ commit, state }, payload) {
      console.log("action: user/loginSuccess");

      setToken(payload);

      return getUser()
        .then(user => {
          console.log("gotUser", user);
          commit("setState", "success");
          commit("setError", null);
          commit("setLoggedIn", true);
          commit("setId", user.id);
          commit("setName", user.name);
          commit("setEmail", user.email);
        })
        .catch(console.error);
    },

    loginFailure({ commit }, payload) {
      commit("setState", "failure");
      commit("setError", payload);
    },

    register({ commit, dispatch }, payload) {
      commit("setState", "loading");

      registerUser(payload)
        .catch(error => {
          dispatch("registerFailure", error);

          return Promise.reject(error);
        })
        .then(result => {
          dispatch("registerSuccess", result);
        });
    },

    registerSuccess({ commit }, payload) {
      console.log("action: user/registerSuccess", payload);
      commit("setState", "success");
      commit("setError", null);
      commit("setLoggedIn", true);
      commit("setUser", payload);
    },

    registerFailure({ commit }, payload) {
      console.log("action: user/registerFailure", payload);
      commit("setState", "failure");
      commit("setError", payload);
    },

    logout({ commit, dispatch }) {
      commit("setState", "loading");

      return logoutUser()
        .catch(error => {
          commit("setState", "failure");
          commit("setError", error.message);

          dispatch("clearUser");

          return Promise.reject(error);
        })
        .then(result => {
          commit("setState", "success");
          commit("setError", null);

          dispatch("clearUser");
        });
    },

    clearUser({ commit }) {
      commit("setLoggedIn", false);
      commit("setId", null);
      commit("setName", null);
      commit("setEmail", null);

      clearToken();
    }
  }
};
