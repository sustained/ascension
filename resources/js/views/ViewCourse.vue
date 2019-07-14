<template>
  <Loader
    module="course"
    action="load"
    getter="isLoaded"
    retrieve="getById"
    :primary-key="$route.params.course_id"
    :resource.sync="course"
  >
    <h2 class="text-2xl font-bold m-2">View Course &ndash; {{ course.title }}</h2>

    <h3 class="text-xl font-bold m-2">Levels</h3>

    <ul class="list-outside list-disc ml-6">
      <li v-for="level in course.levels" :key="level.id">
        <router-link
          :to="{ name: 'level', params: { level_id: level.id, course_id: course.id } }"
        >{{ level.title }}</router-link>
      </li>
    </ul>
  </Loader>
</template>

<script>
import { get } from "vuex-pathify";

import Loader from "../components/base/Loader.vue";

export default {
  data() {
    return {
      course: {}
    };
  },

  components: { Loader }
};
</script>

<style scoped>
</style>
