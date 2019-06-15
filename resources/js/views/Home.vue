<template>
  <div>
    <h1>Home</h1>

    <h2>User (DEBUG)</h2>

    <pre>{{ user }}</pre>
  </div>
</template>

<script>
import http from "../http.js";

export default {
  data() {
    return {
      user: null
    };
  },

  created() {
    http.get("user").then(result => (this.user = result.data));
  }
};
</script>

<style scoped>
</style>
