<template>
  <div class="text-center" @click.prevent="markAsFavorite">
    <a href="#" class="btn btn-outline-red-neon favorite-button">
      <span v-if="! buttonFavorited">
        Favorite

        <span class="favorite-heart-block">
          <span class="favorite-heart-button">♥</span>
        </span>
      </span>
      <span v-else>
        Favorited!
      </span>
    </a>
  </div>
</template>

<script>
export default {
  name: 'favorite-button',

  props: {
    game: Object,
    favorited: Boolean,
  },

  data() {
    return {
      buttonFavorited: null,
    }
  },

  methods: {
    markAsFavorite() {
      if (this.buttonFavorited == null) {
        this.buttonFavorited = this.favorited;

        return;
      }

      this.buttonFavorited = ! this.buttonFavorited;
      this.$store.dispatch('markAsFavorite', this.game);
    }
  },
};
</script>

<style lang="scss">
  .favorite-button:hover, .favorite-heart-button:hover {
    color: #C60D25 !important;
    border-color: #C60D25 !important;
  }
</style>