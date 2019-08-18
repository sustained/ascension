<template>
  <div class="w-1/2 p-4">
    <h2 class="text-xl underline">
      <router-link :to="`/courses/${course.id}`">{{ course.title }}</router-link>
    </h2>

    <pre>{{ JSON.stringify(course, null, 4) }}</pre>
  </div>
</template>

<script>
export default {
  props: ["course"]
};
</script>

<style>
</style>
