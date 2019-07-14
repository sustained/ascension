import http from "../../http.js";

export default {
  namespaced: true,

  state: {
    course: {
      id: null,
      author_id: null,
      title: null,
      created_at: null,
      updated_at: null,
      levels: []
    },

    currentLevel: null,

    state: "unloaded",
    error: null

    // currentCourseIndex: null,
    // currentLevelIndex: null
  },

  mutations: {
    setCourse: (state, payload) => {
      state.course = Object.assign({}, payload);
    },

    setLevel: (state, payload) => {
      state.currentLevel = state.course.levels.find(level => level.id == payload);
    },

    setLoadingState: (state, payload) => (state.state = payload),
    setErrorMessage: (state, payload) => (state.error = payload)
  },

  actions: {
    load({ state, commit }, id) {
      commit("setLoadingState", "loading");

      return http
        .get(`/api/courses/${id}?load=levels.words`)
        .then(response => {
          commit("setCourse", response.data);
          // commit("setCurrentCourse", state.courses.length - 1);
          commit("setLoadingState", "loaded");

          return state.course;
        })
        .catch(error => {
          commit("setErrorMessage", error.message);
          commit("setLoadingState", "errored");
        });
    }
  },

  getters: {
    /*
      Has a course been loaded and does it match the passed course ID?
    */
    isLoaded(state) {
      return courseId => state.course.id && state.course.id == courseId;
    },

    /*
      Return the words for the current level, if possible.
    */
    words(state, getters) {
      return state.currentLevel ? state.currentLevel.words : null;
    }
  }
};
