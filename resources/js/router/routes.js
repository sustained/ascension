import Home from "../views/Home.vue";
import Course from "../views/ViewCourse.vue";
import Level from "../views/ViewLevel.vue";
import Courses from "../views/ListCourses.vue";
import NotFound from "../views/NotFound.vue";

export default [
  { path: "/", component: Home, name: "home" },
  { path: "/courses", component: Courses, name: "courses" },
  { path: "/courses/:course_id", component: Course, name: "course", props: true },
  {
    path: "/courses/:course_id/level/:level_id",
    component: Level,
    name: "level",
    props: true
  },
  { path: "*", component: NotFound }
];
