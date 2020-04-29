export default {
  namespaced: true,

  state: {
    loggedIn: localStorage.getItem('loggedIn') || false,
    user: JSON.parse(localStorage.getItem('user')) || {},
  },

  getters: {
    isAuthenticated(state) {
      return state.loggedIn;
    },
    
    userAuthenticatedName(state) {
      return state.user.name;
    },
  },

  mutations: {
    setLogin(state) {
      state.loggedIn = true;
      localStorage.setItem('loggedIn', true);
    },

    setUser(state, user) {
      state.user = user;
      localStorage.setItem('user', JSON.stringify(user));
    },

    setLogout(state) {
      state.loggedIn = false;
      localStorage.removeItem('loggedIn');
      state.user = {};
      localStorage.removeItem('user');
    }
  },

  actions: {
    login(context, credentials) {
      return new Promise((resolve, reject) => {
        axios.get('/sanctum/csrf-cookie')
          .then(() => {
            axios.post('/login', {
              'email': credentials.email,
              'password': credentials.password,
            })
              .then(response => {
                context.commit('setLogin');

                resolve(response)
              })
              .catch(error => {
                reject(error)
              });
          })
          .catch(error => {
            console.log(error);
          });
      });
    },

    register(context, credentials) {
      return new Promise((resolve, reject) => {
        axios.get('/sanctum/csrf-cookie')
          .then(() => {
            axios.post('/register', {
              'name': credentials.name,
              'email': credentials.email,
              'password': credentials.password,
              'password_confirmation': credentials.password,
            })
              .then(response => {
                // context.commit('setLogin');
  
                resolve(response)
              })
              .catch(error => {
                console.log(error);
                reject(error)
              });
          })
          .catch(error => {
            console.log(error);
          });
      });
    },

    getAuthUser(context) {
      axios.get('/api/user').then(response => {
        context.commit('setUser', response.data);
      });
    },

    logout(context) {
      context.commit('setLogout');

      axios.post('/logout')
        .then(response => {
          console.log(response);
        });
    }
  },
};