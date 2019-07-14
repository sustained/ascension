import http from "../http.js";
import axios from "axios";

export function loginUser(credentials) {
  return new Promise((resolve, reject) => {
    console.log("auth/loginUser", credentials);

    axios
      .post("/api/auth/login", credentials)
      .then(({ data }) => {
        console.log("[api/auth#loginUser] success");

        resolve(data);
      })
      .catch(error => {
        console.log("[api/auth#loginUser] failure");

        reject(error.response.data.message);
      });
  });
}

export function registerUser(credentials) {
  return new Promise((resolve, reject) => {
    console.log("[api/auth - registerUser]", credentials);

    http
      .post("/api/auth/register", credentials)
      .then(({ data }) => {
        console.log("[api/auth#registerUser] success");

        resolve(data);
      })
      .catch(({ response }) => {
        console.log("[api/auth#registerUser] failure");

        reject(response.data);
      });
  });
}

export function logoutUser() {
  return new Promise((resolve, reject) => {
    console.log("[api/auth#logoutUser]");

    http
      .post("/api/auth/logout")
      .then(({ data }) => {
        console.log("[api/auth#logoutUser] success");

        resolve(data);
      })
      .catch(({ response }) => {
        console.log("[api/auth#logoutUser] failure");

        reject(response.data);
      });
  });
}

export function getUser() {
  return new Promise((resolve, reject) => {
    console.log("[api/auth#getUser]");

    http
      .post("/api/auth/me")
      .then(({ data }) => {
        console.log("[api/auth#getUser] success");

        resolve(data);
      })
      .catch(({ response }) => {
        console.log("[api/auth#getUser] failure");

        reject(response.data);
      });
  });
}

export function refreshToken() {
  return new Promise((resolve, reject) => {
    console.log("[api/auth#refreshToken]");

    http
      .post("/api/auth/refresh")
      .then(({ data }) => {
        console.log("[api/auth#refreshToken] success");

        resolve(data);
      })
      .catch(({ response }) => {
        console.log("[api/auth#refreshToken] failure");

        reject(response.data);
      });
  });
}

export function setToken(tokenData) {
  console.log("[api/auth#setToken]");

  localStorage.setItem("token", JSON.stringify(tokenData.access_token));
}

export function getToken() {
  console.log("[api/auth#getToken]");

  try {
    return JSON.parse(localStorage.getItem("token"));
  } catch (e) {
    return "";
  }
}

export function clearToken() {
  console.log("[api/auth#clearToken]");

  localStorage.clear("token");
}
