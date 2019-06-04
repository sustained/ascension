<template>
  <div>
    <h2>List Courses</h2>

    <p v-if="loading">Loading courses...</p>

    <ul v-else-if="loaded">
      <li v-for="course in courses" :key="course.id">
        <router-link :to="`/courses/${course.id}`">{{ course.title }}</router-link>
      </li>
    </ul>
  </div>
</template>

<script>
import { mapState } from "vuex";

export default {
  created() {
    if (this.$store.state.courses.state !== "loaded")
      this.$store.dispatch("courses/load");
  },

  computed: {
    ...mapState("courses", ["courses", "state"]),

    loaded() {
      return this.state === "loaded";
    },

    loading() {
      return this.state === "loading";
    }
  }
};
</script>

<style scoped>
</style>
