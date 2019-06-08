<template>
  <div>
    <div v-if="state === 'loaded'">
      <h2>View Course &ndash; {{ course.title }}</h2>
      <h3>Levels</h3>

      <ul>
        <li v-for="level in course.levels" :key="level.id">
          <router-link
            :to="{ name: 'level', params: { level_id: level.id, course_id: course.id } }"
          >{{ level.title }}</router-link>
        </li>
      </ul>
    </div>

    <div v-else>Please wait...</div>
  </div>
</template>

<script>
import { get } from "vuex-pathify";

export default {
  computed: {
    state: get("course/state"),
    course: get("course/course")
  },

  created() {
    const courseId = this.$route.params.course_id;
    const loaded = this.$store.getters["course/isLoaded"](courseId);

    console.log(`Course #${courseId} isLoaded: ` + loaded);

    if (!loaded) {
      console.log("Loading course...");

      this.$store.dispatch("course/load", courseId);
    }
  }
};
</script>

<style scoped>
</style>
