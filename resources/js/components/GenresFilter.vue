<template>
  <div class="input-group mb-3">
    <select class="custom-select" v-model="genreSelected">
      <option selected value="">
        Genre...
      </option>
      <option
        v-for="(genre, key) in genres"
        :key="key" 
        :value="genre.id"
      >
        {{ genre.name }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  name: 'genres-filter',

  props: {
    genres: Array,
  },

  data() {
    return {
      genreSelected: '',
    }
  },

  watch: {
    genreSelected(newValue) {
      this.$store.dispatch('searchGames', {name: 'genres', value: newValue});
    } 
  }
}
</script>

<style lang="scss" scoped>

</style>