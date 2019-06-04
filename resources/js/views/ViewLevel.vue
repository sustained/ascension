<template>
  <div>
    <h2>View Level</h2>

    <ul v-if="loaded">
      <li v-for="word in currentLevel.words" :key="word.id">{{ word.source }} -> {{ word.target }}</li>
    </ul>
  </div>
</template>

<script>
import { mapState, mapGetters } from "vuex";

export default {
  props: ["course_id", "level_id"],

  async created() {
    if (!this.$store.getters["course/loaded"](this.course_id)) {
      await this.$store.dispatch("course/load", this.course_id);
    }

    if (!this.$store.state.currentLevelIndex) {
      this.$store.dispatch("course/setLevel", this.level_id);
    }
  },

  computed: {
    loaded() {
      return this.currentLevel && this.currentLevel.words;
    },

    ...mapGetters("course", ["currentLevel"])
  }
};
</script>

<style scoped>
</style>
