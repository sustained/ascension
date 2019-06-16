<template>
  <div class="autocomplete-wrapper inline-block">
    <input
      type="text"
      placeholder="Type to search..."
      v-model="input"
      @focus="showOptions"
      class="bg-gray-800 text-gray-100 rounded-sm relative"
    >

    <div
      class="autocomplete-options absolute bg-gray-800 border-black border-solid border-2 z-10"
      v-show="optionsVisible"
    >
      <ul>
        <li
          v-for="(option, index) in filteredOptions"
          :key="index"
          @click.prevent="selectOption(option)"
        >{{ getItem(option) }}</li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    options: {
      type: [Object, Array]
    },

    getItem: {
      type: Function,
      default() {
        return i => i;
      }
    },

    filter: {
      type: Function,
      default(input, option) {
        return (
          this.getItem(option)
            .toLocaleLowerCase()
            .indexOf(input.toLocaleLowerCase()) !== -1
        );
      }
    }
  },

  data() {
    return {
      input: "",
      optionsVisible: false
    };
  },

  mounted() {
    document.addEventListener("click", this.handleClick);
  },

  destroyed() {
    document.removeEventListener("click", this.handleClick);
  },

  computed: {
    filteredOptions() {
      if (this.input === "") {
        return this.options;
      }

      return this.options.filter(option => {
        return this.filter(this.input, option);
      });
    }
  },

  methods: {
    selectOption(option) {
      option = this.getItem(option);
      console.log(`Selecting ${option}.`);

      this.input = option;
      this.hideOptions();
    },

    showOptions() {
      this.optionsVisible = true;
    },

    hideOptions() {
      this.optionsVisible = false;
    },

    handleClick(event) {
      if (!this.$el.contains(event.target)) {
        this.hideOptions();
      }
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
