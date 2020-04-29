<template>
  <div class="d-flex justify-content-center">
    <div class="games-filter d-flex lg:w-1/4 align-items-center">
      <label class="pr-2 pb-2">Search</label>
      <genres-filter :genres="genres"></genres-filter>
      <platforms-filter :platforms="platforms"></platforms-filter>
    </div>
  </div>
</template>

<script>
import GenresFilter from "./GenresFilter";
import PlatformsFilter from "./PlatformsFilter";

export default {
  name: "games-filter",

  components: {
    "genres-filter": GenresFilter,
    "platforms-filter": PlatformsFilter
  },

  computed: {
    genres() {
      return this.$store.state.genres;
    },

    platforms() {
      return this.$store.state.platforms;
    }
  },

  created() {
    this.getGenres();
    this.getPlatforms();
  },

  methods: {
    getGenres() {
      this.$store.dispatch("getGenres");
    },

    getPlatforms() {
      this.$store.dispatch("getPlatforms");
    }
  }
};
</script>

<style lang="scss" scoped>
.games-filter {
  min-width: 300px;
}

.games-filter label {
  white-space: nowrap;
}
</style>