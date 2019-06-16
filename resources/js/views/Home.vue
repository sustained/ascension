<template>
  <div class="avoid-fixed-nav px-4">
    <h1 class="text-lg font-bold my-2">Home</h1>

    <ul>
      <li>
        <a href="#" @click="checkSession">Check Session</a>
      </li>
      <li>
        <router-link to="/auth-test">Auth Test</router-link>
      </li>
    </ul>

    <pre>{{ user }}</pre>
  </div>
</template>

<script>
import http from "../http.js";

import { checkUser } from "../api/auth.js";

export default {
  data() {
    return {
      user: null
    };
  },

  created() {},

  methods: {
    checkSession() {
      checkUser().then(({ data }) => {
        this.user = data;
      });
    }
  }
};
</script>

<style scoped>
</style>
