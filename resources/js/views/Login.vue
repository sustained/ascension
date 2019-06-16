<template>
  <div class="container container-fixed">
    <div class="center-full">
      <div class="w-1/2">
        <div class="card bg-discord-bg-1 shadow-lg">
          <h1>Login</h1>

          <div
            v-if="showError"
            class="border-solid bg-red-800 border-2 border-red-900 p-4 rounded-lg"
          >{{ error }}</div>

          <form method="POST" action="/api/login" @submit.prevent="loginUser">
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

            <div
              class="row p-3 items-center justify-between bg-discord-bg-3 mt-2 -mx-4 -mb-4 rounded-b-lg"
            >
              <div class="flex items-center btn muted">
                <input
                  class="mr-2 w-4 h-4"
                  type="checkbox"
                  name="remember"
                  id="remember"
                  v-model="payload.remember"
                >

                <label class="text-sm" for="remember">Remember Me</label>
              </div>

              <div>
                <button type="submit" class="btn blue mr-4">Login</button>

                <button class="btn muted">Forgot Password</button>
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
        email: "",
        password: "",
        remember: false
      }
    };
  },

  created() {
    if (this.$route.query.to) this.to = this.$route.query.to;
  },

  methods: {
    loginUser() {
      this.$store.dispatch("user/login", this.payload).then(() => {
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
