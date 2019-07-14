import axios from "axios";
import createAuthRefreshInterceptor from "axios-auth-refresh";

import router from "./router/router.js";
import store from "./store/store.js";
import { getToken, setToken } from "./api/auth.js";

axios.defaults.headers.common["Content-Type"] = "application/json";
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

const http = axios.create();

http.interceptors.request.use(request => {
  request.headers["Authorization"] = "Bearer " + getToken();

  return request;
});

createAuthRefreshInterceptor(http, function(failedRequest) {
  console.log("[auth refresh interceptor] refreshing expired token");

  if (!getToken()) {
    return router.push({ path: "user/login" });
  }

  return http
    .post("/api/auth/refresh")
    .then(tokenRefreshResponse => {
      console.log("[auth refresh interceptor] received new token");
      console.log(
        "[auth refresh interceptor] changed old token ending in " +
          getToken().substr(-3) +
          " to token ending in " +
          tokenRefreshResponse.data.access_token.substr(-3)
      );
      setToken(tokenRefreshResponse.data);

      console.log("[auth refresh interceptor] finishing up queued requests");
      failedRequest.response.config.headers["Authentication"] = "Bearer " + tokenRefreshResponse.data.access_token;

      return Promise.resolve();
    })
    .catch(({ response }) => {
      console.log("[auth refresh interceptor] unable to refresh token (probably expired)");

      store.dispatch("user/clearUser").then(() => {
        router.push({ path: "user/login", query: { expired: true } });
      });
    });
});

export default http;
