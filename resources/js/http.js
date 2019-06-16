import axios from "axios";
import app from "./app.js";
import { getUser } from "./api/auth.js";

axios.defaults.headers.common["Content-Type"] = "application/json";
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// let token = document.head.querySelector('meta[name="csrf-token"]');

// if (token) {
//   axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
// } else {
//   console.error("CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token");
// }

const user = getUser();

if (user) {
  axios.defaults.headers.common["Authorization"] = "Bearer " + user.token;
}

const http = axios.create({ baseURL: "/api" });

// http.interceptors.response.use(
//   response => response,
//   error => {
//     if (error.response.status === 401) {
//       console.info("got 401, redirecting to /login");
//       app.$router.push({ name: "login" });
//     } else {
//       console.error(error);
//     }

//     return Promise.reject(error);
//   }
// );

export default http;
