import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios";
import authentication from './modules/authentication';

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    authentication: authentication,
  },

  state: {
    games: [],
    genres: [],
    platforms: [],
    filters: {},
  },

  getters: {
    games(state) {
      return state.games;
    },
  },

  mutations: {
    setGames(state, games) {
      state.games = games;
    },

    setGenres(state, genres) {
      state.genres = genres;
    },

    setPlatforms(state, platforms) {
      state.platforms = platforms;
    },

    setFilter(state, filter) {
      state.filters[filter.name] = filter.value;
    }
  },

  actions: {
    getGames(context) {
      return new Promise((resolve, reject) => {
        axios.get('/api/games')
        .then(response => {
          context.commit('setGames', response.data);
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
      });
    },

    getGenres(context) {
      axios.get('/api/genres')
        .then(response => {
          context.commit('setGenres', response.data);
        })
        .catch(error => {
          console.log(error);
        })
    },

    getPlatforms(context) {
      axios.get('/api/platforms')
        .then(response => {
          context.commit('setPlatforms', response.data);
        })
        .catch(error => {
          console.log(error);
        })
    },

    markAsFavorite(context, game) {
      axios.get('/api/mark-as-favorite/' + game.id)
      .then(response => {
        console.log(response);
      })
      .catch(error => {
        console.log(error)
      });      
    },

    addFilter(context, filter) {
      context.commit('setFilter', filter);
    },

    searchGames(context, filter) {
      context.dispatch('addFilter', filter);

      axios.post('/api/games/search', context.state.filters)
        .then(response => {
          context.commit('setGames', response.data);
        })
        .catch(error => {
          console.log(error)
        });
    }
  },
})

export default store;