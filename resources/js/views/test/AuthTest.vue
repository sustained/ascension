<template>
  <div class="container">
    <h1 class="text-lg font-bold my-2">Auth Test</h1>

    <div v-if="loggedIn">
      <p>Welcome {{ name }} ({{ email }})!</p>

      <h2 class="text-lg font-bold my-2">Auth Testing</h2>

      <p>Auth Token expires in: {{ countdowns.authTokenExpiresIn }} seconds.</p>
      <p>Refresh Token expires in: {{ countdowns.refreshTokenExpiresIn }} seconds.</p>

      <ul class="list-outside list-disc mt-2">
        <li>
          <a href="#" @click="checkSession">Check Session</a>
        </li>

        <li>
          <a href="#" @click="refreshToken">Refresh Token</a>
        </li>

        <li>
          <router-link to="/auth-test">Auth Test</router-link>
        </li>
      </ul>

      <pre>{{ user }}</pre>
    </div>

    <div v-else>
      <p>Welcome unauthenticated user!</p>
    </div>
  </div>
</template>

<script>
import http from "@/http.js";
import { get } from "vuex-pathify";
import { getUser, setUser, checkUser, refreshToken } from "@/api/auth.js";

export default {
  data() {
    return {
      interval: null,
      countdowns: {
        authTokenExpiresIn: 60,
        refreshTokenExpiresIn: 120
      },
      user: null
    };
  },

  mounted() {
    this.interval = setInterval(() => {
      if (this.countdowns.authTokenExpiresIn > 0) {
        this.countdowns.authTokenExpiresIn--;
      }

      if (--this.countdowns.refreshTokenExpiresIn === 0) {
        clearInterval(this.interval);
      }
    }, 1000);
  },

  computed: {
    name: get("user/name"),
    email: get("user/email"),
    loggedIn: get("user/loggedIn")
  },

  methods: {
    checkSession() {
      getUser().then(user => {
        this.user = user;
      });
    },

    refreshToken() {
      //   refreshToken().then(({ data }) => {
      //     setUser({ token: data.access_token });
      //   });
    }
  }
};
</script>

<style scoped>
</style>
