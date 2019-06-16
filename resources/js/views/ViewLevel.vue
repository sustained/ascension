<template>
  <div v-if="isLoaded" class="avoid-fixed-nav">
    <h2>View Level</h2>

    <ul>
      <li v-for="word in words" :key="word.id">{{ word.source }} -> {{ word.target }}</li>
    </ul>
  </div>
</template>

<script>
// import { mapState, mapGetters } from "vuex";
import { get } from "vuex-pathify";

export default {
  props: ["course_id", "level_id"],

  async created() {
    console.log("created", this.course_id, this.level_id);

    // if (!this.$store.state.currentLevelId) {

    // }

    if (!this.$store.getters["course/isLoaded"](this.course_id)) {
      console.log("loading course");
      await this.$store.dispatch("course/load", this.course_id);
      console.log(this.$store.state);
    }

    console.log("setting current level");
    this.$store.commit("course/setLevel", this.level_id);
  },

  computed: {
    ...{
      isLoaded: get("course/isLoaded"),
      words: get("course/words")
    }
  }
};
</script>

<style scoped>
</style>
