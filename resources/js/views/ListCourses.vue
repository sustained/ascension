<template>
  <div class="container">
    <!-- <h2>List Courses</h2> -->

    <p v-if="isLoading">Loading courses...</p>

    <ul v-else-if="isLoaded" class="flex flex-wrap">
      <li v-for="course in courses" :key="course.id" class="w-1/4 p-4">
        <div class="box">
          <router-link :to="`/courses/${course.id}`">{{ course.title }}</router-link>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
import { get, dispatch } from "vuex-pathify";

import store from "../store/store.js";

export default {
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
