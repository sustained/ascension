import Home from "../views/Home.vue";
import Course from "../views/ViewCourse.vue";
import Level from "../views/ViewLevel.vue";
import Courses from "../views/ListCourses.vue";
import NotFound from "../views/NotFound.vue";
import Login from "../views/Login.vue";
import Register from "../views/Register.vue";
import AuthTest from "../views/test/AuthTest.vue";

export default [
  { path: "/", component: Home, name: "home" },
  { path: "/user/login", component: Login, name: "login" },
  { path: "/user/register", component: Register, name: "register" },
  { path: "/auth-test", component: AuthTest, name: "auth-test", meta: { requiresAuth: true } },
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
