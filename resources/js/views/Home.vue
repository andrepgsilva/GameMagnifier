<template>
  <div class="container-fluid d-flex justify-content-center">
    <div class="d-flex flex-column align-items-center">
      <h1 class="text-3xl py-3">Popular Games</h1>
      <div class="col-md-10">
        <games-filter></games-filter>
        <transition-group
          class="d-flex flex-sm-column flex-md-row flex-wrap justify-content-center" 
          
        >
            <card v-for="game in games" :key="game.id" :game="game"></card>
        </transition-group>
      </div>
    </div>
  </div>
</template>

<script>
import card from '../components/Card';
import gamesFilter from '../components/GamesFilter';

export default {
  name: "home",

  components: {
    'card': card,
    'games-filter': gamesFilter,
  },

  created() {
    this.getGames();
  },

  computed: {
    games() {
      return this.$store.getters.games;
    }
  },

  methods: {
    getGames() {
      this.$store
        .dispatch("getGames")
        .catch(error => {
          if (error.response.status == "401") {
            if (this.$store.getters["authentication/isAuthenticated"]) {
              this.$store.dispatch("authentication/logout");
            }
          }
        });
    }
  }
};
</script>

<style>
  
</style>