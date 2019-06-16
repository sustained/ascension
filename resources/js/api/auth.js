import http from "../http.js";

export function loginUser(credentials) {
  return new Promise((resolve, reject) => {
    console.log("auth, loginUser", credentials);
    http
      .post("/auth/login", credentials)
      .then(({ data }) => {
        console.log("resolving login promise");
        resolve(data);
      })
      .catch(({ response }) => {
        console.log("rejecting login promise");
        reject({
          error: response.data.error,
          status: response.status
        });
      });
  });
}

export function registerUser(credentials) {
  return new Promise((resolve, reject) => {
    http
      .post("/auth/register", credentials)
      .then(response => resolve(response))
      .catch(({ response }) => {
        reject({
          error: response.data.error,
          status: response.status
        });
      });
  });
}

export function logoutUser() {
  return new Promise((resolve, reject) => {
    http
      .post("/auth/logout")
      .then(response => resolve(response))
      .catch(({ response }) => {
        reject({
          error: response.data.error,
          status: response.status
        });
      });
  });
}

export function checkUser() {
  return new Promise((resolve, reject) => {
    http
      .post("/auth/me")
      .then(response => resolve(response))
      .catch(({ response }) => {
        reject({
          error: response.data.error,
          status: response.status
        });
      });
  });
}

export function getUser() {
  const user = localStorage.getItem("user");

  if (!user) return null;

  return JSON.parse(user);
}
