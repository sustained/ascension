<template>
  <div class="container overflow-hidden">
    <transition-group tag="div" name="fade">
      <div key="loaded" v-if="isLoaded" appear>
        <slot></slot>
      </div>

      <div key="loading" v-else-if="isLoading">
        <div class="center-full">
          <img src="/img/loading.gif" />
        </div>
      </div>

      <div key="errored" v-else-if="didError">
        <div class="center-full">Error...</div>
      </div>
    </transition-group>
  </div>
</template>

<script>
export default {
  props: {
    module: {
      type: String,
      required: true
    },

    action: {
      type: String,
      required: true
    },

    getter: {
      type: String,
      required: true
    },

    retrieve: {
      type: String,
      required: true
    },

    primaryKey: {
      type: [Number, String],
      required: true
    }
  },

  data() {
    return {
      animationWaitTime: 200,
      didError: false,
      isLoading: false,
      isTransitioning: false
    };
  },

  created() {
    if (!this.isLoaded) {
      try {
        this.isLoading = true;
        this.$store
          .dispatch(`${this.module}/${this.action}`, this.primaryKey)
          .then(entity => {
            this.isLoading = false;
            this.isTransitioning = true;
            setTimeout(() => {
              this.isTransitioning = false;
              this.$emit("update:resource", entity);
            }, this.animationWaitTime + 50);
          })
          .catch(e => console.error);
      } catch (e) {
        this.didError = !(this.isLoading = false);
      }
    } else {
      this.isLoading = this.didError = false;
      this.$emit("update:resource", this.entity);
    }
  },

  computed: {
    entity() {
      return this.$store.getters[`${this.module}/${this.retrieve}`](
        this.primaryKey
      );
    },

    isLoaded() {
      return !this.isLoading && !this.isTransitioning && !!this.entity;
    }
  }
};
</script>

<style>
.fade-enter-active {
  transition: opacity 0.5s;
}
.fade-leave-active {
  transition: opacity 0.2s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
