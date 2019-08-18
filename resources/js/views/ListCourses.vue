<template>
  <div class="container">
    <!-- <course-language-sidebar /> -->

    <p v-if="isLoading">Loading courses...</p>

    <ul v-else-if="isLoaded" class="flex flex-wrap">
      <course-card v-for="course in courses" :key="course.id" :course="course" />
    </ul>
  </div>
</template>

<script>
import { get, dispatch } from "vuex-pathify";

import store from "../store/store.js";

import CourseCard from "./courses/CourseCard.vue";
import CourseLanguageSidebar from "./courses/CourseLanguageSidebar.vue";

export default {
  components: { CourseCard, CourseLanguageSidebar },

  async beforeRouteEnter(to, from, next) {
    if (store.state.courses.state !== "loaded") {
      dispatch("courses/load");
    }

    next();
  },

  computed: {
    courses: get("courses/courses"),
    loaded: get("courses/state"),

    isLoaded() {
      return this.loaded === "loaded";
    },

    isLoading() {
      return this.loaded === "loading";
    }
  }
};
</script>

<style scoped>
</style>
