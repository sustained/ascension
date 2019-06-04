export default {
  methods: {
    view: {
      level(courseId, levelId) {
        return {
          name: "level",
          params: { course_id: courseId, level_id: levelId }
        };
      }
    }
  }
};
