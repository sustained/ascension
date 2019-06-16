<template>
  <article>
    <h1>Find Courses</h1>

    <h2>I speak...</h2>

    <autocomplete :options="languages.speak" :getItem="(i) => i.name"/>

    <h2>I want to learn...</h2>

    <autocomplete :options="languages.learn" :getItem="(i) => i.name"/>
  </article>
</template>

<script>
export default {
  data() {
    return {
      languages: {
        speak: [
          { code: "en", name: "English" },
          { code: "sv", name: "Swedish" },
          { code: "de", name: "German" }
        ],

        learn: [
          { code: "en", name: "English" },
          { code: "sv", name: "Swedish" },
          { code: "de", name: "German" }
        ]
      }
    };
  }
};
</script>

<style lang="scss" scoped>
.test {
  @apply bg-red-400;
}
</style>
