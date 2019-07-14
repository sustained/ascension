import Vue from "vue";
import VueRouter from "vue-router";

import store from "../store/store.js";
import routes from "./routes.js";
import { getToken } from "../api/auth.js";

Vue.use(VueRouter);

const router = new VueRouter({
  mode: "history",
  routes: routes
});

router.beforeEach(async (to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    /*
      If there is no token then there is no point in even hitting the endpoint.
    */
    if (!getToken()) {
      return next({
        path: "/user/login",
        query: { to: to.fullPath, noToken: true }
      });
    }

    try {
      await store.dispatch("user/get");

      next();
    } catch (e) {
      next({
        path: "/user/login",
        query: { to: to.fullPath }
      });
    }
  } else {
    next();
  }
});

export default router;
