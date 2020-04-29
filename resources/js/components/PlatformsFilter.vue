<template>
  <div class="input-group mb-3 ml-2">
    <select class="custom-select" v-model="platformSelected">
      <option selected value="">Platform...</option>

      <option
        v-for="(platform, key) in platforms"
        :key="key"
        :value="platform.id"
      >
        {{ platform.name }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  name: "platforms-filter",

  props: {
    platforms: Array
  },

  data() {
    return {
      platformSelected: '',
    }
  },

  watch: {
    platformSelected(newValue) {
      this.$store.dispatch('searchGames', {name: 'platforms', value: newValue});
    }
  }
};
</script>

<style lang="scss" scoped>
</style>