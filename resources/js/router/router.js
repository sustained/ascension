import Vue from "vue";
import VueRouter from "vue-router";

import store from "../store/store.js";
import routes from "./routes.js";
import { getUser } from "../api/auth.js";

Vue.use(VueRouter);

const router = new VueRouter({
  mode: "history",
  routes: routes
});

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    const user = getUser();

    store
      .dispatch("user/check")
      .then(result => {
        console.log("user is authed?", result);
        next();
      })
      .catch(error => {
        console.log("user is not authed!", error);
        next({
          path: "/user/login",
          query: { to: to.fullPath }
        });
      });
  } else {
    next();
  }
});

export default router;
