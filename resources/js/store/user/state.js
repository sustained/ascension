import { getUser, loginUser, logoutUser, checkUser, registerUser } from "../../api/auth.js";

const user = getUser();
console.log("getUser", user);

export default {
  namespaced: true,

  state: {
    user: user,
    registeredUser: null,
    loggedIn: !!user,
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
    setUser: (state, payload) => (state.user = payload),
    setRegisteredUser: (state, payload) => (state.registerUser = payload)
  },

  actions: {
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
      console.log("payload is", payload);
      commit("setState", "success");
      commit("setError", null);
      commit("setLoggedIn", true);
      commit("setUser", Object.assign({}, payload.user, { token: payload.access_token }));

      localStorage.setItem("user", JSON.stringify(state.user));
    },

    loginFailure({ commit }, payload) {
      console.log("action: user/loginFailure", payload);
      commit("setState", "failure");
      commit("setError", payload.error);
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

    registerSuccess(state, payload) {
      console.log("action: user/registerSuccess", payload);
      commit("setState", "success");
      commit("setError", null);
      commit("setRegisteredUser", payload.user);
    },

    registerFailure(state, payload) {
      console.log("action: user/registerFailure", payload);
      commit("setState", "failure");
      commit("setError", payload.error);
    },

    logout({ commit }) {
      commit("setState", "loading");

      return logoutUser()
        .catch(error => {
          console.error("An error occured while logging out???");

          return Promise.reject(error);
        })
        .then(result => {
          console.info("Logged out successfully...");

          commit("setState", "success");
          commit("setError", null);
          commit("setLoggedIn", false);
          commit("setUser", null);

          localStorage.removeItem("user");
        });
    },

    check() {
      return checkUser();
    }
  }
};
