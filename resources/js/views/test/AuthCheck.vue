<template>
  <div class="container">
    <h1>Hello, authenticated user.</h1>

    <code>
      <pre>{{ user }}</pre>
    </code>
  </div>
</template>

<script>
import { getUser } from "@/api/auth.js";

export default {
  data() {
    return {
      user: null
    };
  },

  created() {
    getUser().then(user => (this.user = user));
  }
};
</script>
