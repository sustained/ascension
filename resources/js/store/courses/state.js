import http from "../../http.js";

export default {
  namespaced: true,

  state: {
    state: "unloaded",
    error: null,
    courses: []
  },

  mutations: {
    setCoursesList: (state, payload) => (state.courses = payload),
    setLoadingState: (state, payload) => (state.state = payload),
    setErrorMessage: (state, payload) => (state.error = payload)
  },

  actions: {
    load({ commit }) {
      commit("setLoadingState", "loading");

      http
        .get("/api/courses")
        .then(({ data }) => {
          commit("setCoursesList", data);
          commit("setLoadingState", "loaded");
        })
        .catch(error => {
          commit("setErrorMessage", error.message);
          commit("setLoadingState", "errored");
        });
    }
  },

  getters: {
    urlViewCourses: () => {
      path: "/courses";
    }
  }
};
