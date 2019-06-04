import http from "../../http.js";

export default {
  namespaced: true,

  state: {
    courses: [],
    state: "unloaded",
    error: null,
    currentCourseIndex: null,
    currentLevelIndex: null
  },

  mutations: {
    addCourse: (state, payload) => {
      state.courses.push(payload);
    },

    setCurrentCourse: (state, payload) => (state.currentCourseIndex = payload),
    setCurrentLevel: (state, payload) => (state.currentLevelIndex = payload),

    setLoadingState: (state, payload) => (state.state = payload),
    setErrorMessage: (state, payload) => (state.error = payload)
  },

  actions: {
    setCourse({ state, commit }, id) {
      let index = state.courses.findIndex(course => course.id === id);
      if (index === -1) return;
      commit("setCurrentCourse", index);
    },

    setLevel({ state, getters, commit }, id) {
      state.currentLevelIndex = getters.currentCourse.levels.findIndex(e => e.id === id);
    },

    load({ state, commit }, id) {
      commit("setLoadingState", "loading");

      return http
        .get(`/courses/${id}?load=levels.words`)
        .then(response => {
          commit("addCourse", response.data);
          commit("setCurrentCourse", state.courses.length - 1);
          commit("setLoadingState", "loaded");
        })
        .catch(error => {
          commit("setErrorMessage", error.message);
          commit("setLoadingState", "errored");
        });
    }
  },

  getters: {
    loaded(state) {
      return courseId => !!state.courses.find(course => course && course.id == courseId);
    },

    currentCourse(state) {
      return state.courses[state.currentCourseIndex];
    },

    currentLevel(state) {
      if (
        !state.courses.length ||
        !state.courses[state.currentCourseIndex] ||
        !state.courses[state.currentCourseIndex].levels
      )
        return;

      return state.courses[state.currentCourseIndex].levels[state.currentLevelIndex];
    }
  }
};
