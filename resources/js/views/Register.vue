<template>
  <div class="container">
    <div class="center-full">
      <div class="w-3/4 mb-3">
        <div class="card bg-discord-bg-1 shadow-lg">
          <h1>Register</h1>

          <div v-if="showError" class="error-box">
            <h2>{{ error.message }}</h2>

            <ul>
              <li v-for="(errors, field) in error.errors">
                {{ field }}
                <ol>
                  <li v-for="message in errors">{{ message }}</li>
                </ol>
              </li>
            </ul>
          </div>

          <form method="POST" action="/api/register" @submit.prevent="registerUser">
            <div class="row items-center">
              <div class="col">
                <label for="name" class="col-md-4 col-form-label text-md-right">Username</label>
              </div>

              <div class="col flex-1">
                <input
                  id="name"
                  type="text"
                  class="shadow-inner text-gray-200 rounded-sm form-control"
                  name="name"
                  required
                  autofocus
                  v-model="payload.name"
                >
              </div>
            </div>

            <div class="row items-center">
              <div class="col">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>
              </div>

              <div class="col flex-1">
                <input
                  id="email"
                  type="email"
                  class="shadow-inner text-gray-200 rounded-sm form-control"
                  name="email"
                  required
                  autofocus
                  v-model="payload.email"
                >
              </div>
            </div>

            <div class="row items-center">
              <div class="col">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
              </div>

              <div class="col flex-1">
                <input
                  id="password"
                  type="password"
                  class="shadow-inner text-gray-200 rounded-sm form-control"
                  name="password"
                  v-model="payload.password"
                  required
                >
              </div>
            </div>

            <div class="row items-center">
              <div class="col">
                <label
                  for="password_confirmation"
                  class="col-md-4 col-form-label text-md-right"
                >Confirm Password</label>
              </div>

              <div class="col flex-1">
                <input
                  id="password_confirmation"
                  type="password"
                  class="shadow-inner text-gray-200 rounded-sm form-control"
                  name="password_confirmation"
                  v-model="payload.password_confirmation"
                  required
                >
              </div>
            </div>

            <div
              class="row p-3 items-center justify-between bg-discord-bg-3 mt-2 -mx-4 -mb-4 rounded-b-lg"
            >
              <div class="flex items-center btn muted">
                <input
                  class="mr-2 w-4 h-4"
                  type="checkbox"
                  name="legalese"
                  id="legalese"
                  v-model="payload.legalese"
                >

                <label class="text-sm" for="legalese">Accept Terms & Conditions and Privacy Policy</label>
              </div>

              <div>
                <button type="submit" class="btn blue mr-4">Register</button>

                <button class="btn muted">Login</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import http from "../http.js";
import { get, call } from "vuex-pathify";

export default {
  data() {
    return {
      redirectTo: "/",

      payload: {
        name: "test",
        email: "test@test.com",
        password: "testtest",
        password_confirmation: "testtest",
        legalese: true
      }
    };
  },

  created() {
    if (this.$route.query.to) this.to = this.$route.query.to;
  },

  methods: {
    registerUser() {
      this.$store.dispatch("user/register", this.payload).then(() => {
        console.log("then");
        this.$router.push(this.redirectTo);
      });
    }
  },

  computed: {
    showError: get("user/shouldShowError"),
    error: get("user/error")
  }
};
</script>
