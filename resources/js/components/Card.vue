<template>
  <div class="card mx-1 my-3 w-full md:w-3/5 lg:w-1/5 col-xs-12 game-list-animation">
    <img :src="$appUrl + '/img/' + game.media_path[0].file_name" class="card-img-top" />
    <div class="card-body">
      <h5 class="card-title truncate">{{ game.name }}</h5>
      <div>
        <p class="card-text mb-3">{{ truncateMultilineText(game.description, 111) }}</p>
      </div>
      <favorite-button :game="game" :favorited="game.favorited"></favorite-button>
    </div>
  </div>
</template>

<script>
import favoriteButton from './FavoriteButton';

export default {
  name: "card",

  components: {
    'favorite-button': favoriteButton,
  },

  props: {
    game: Object,
  },
};
</script>

<style lang="scss">
.card {
  max-height: 400px;
  min-width: 300px !important;
  // min-width: 20%;
  // max-width: 310px;
}

.card img {
  height: 42%;
  max-height: 170px;
}

h5.card-title {
  font-size: 1.4em;
}

p.card-text {
  font-size: 1.1em;
  min-height: 101px;
}

// .game-list-animation {
//   animation-duration: 0.4s;
// }
</style>