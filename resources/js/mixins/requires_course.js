import { mapState } from "vuex";

export default {
  // created() {
  //   console.log(this.$store.state.courses.state);
  //   if (this.$store.state.courses.state !== "loaded") {
  //     console.log("(re)loading courses");
  //     this.$store.dispatch("courses/load");
  //   }
  //   console.log(this.$store);
  //   if (!this.$store.getters["course/exists"](this.$route.params.course_id)) {
  //     this.$store.dispatch("course/load", this.$route.params.course_id);
  //   }
  // }
  // computed: {
  //   ...mapState(["currentCourse", "coursesLoadingState"])
  // }
};
