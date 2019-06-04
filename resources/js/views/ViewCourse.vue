<template>
  <div v-if="state === 'loaded'">
    <h2>View Course &ndash; {{ currentCourse.title }}</h2>
    <h3>Levels</h3>

    <ul>
      <li v-for="level in currentCourse.levels" :key="level.id">
        <router-link
          :to="{ name: 'level', params: { level_id: level.id, course_id: currentCourse.id } }"
        >{{ level.title }}</router-link>
      </li>
    </ul>
  </div>
</template>

<script>
import { mapState, mapGetters } from "vuex";

import requiresCourse from "../mixins/requires_course.js";

export default {
  mixins: [requiresCourse],

  computed: {
    ...mapState("course", ["state"]),
    ...mapGetters("course", ["currentCourse"])
  },

  created() {
    if (!this.$store.getters["course/loaded"](this.$route.params.course_id)) {
      console.log("loading course");

      this.$store.dispatch("course/load", this.$route.params.course_id);
    }
  }
};
</script>

<style scoped>
</style>
