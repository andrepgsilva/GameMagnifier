<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <router-link :to="{name: 'home'}" class="navbar-brand">GameMagnifier</router-link>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto"></ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <li 
              class="nav-item dropdown"
              v-if="isAuthenticated"
            >
              <a
                id="navbarDropdown"
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                {{ userAuthenticatedName }} <span class="caret"></span>
              </a>

              <div 
                class="dropdown-menu dropdown-menu-right" 
                aria-labelledby="navbarDropdown"
              >
                <a
                  class="dropdown-item"
                  @click.prevent="logout"
                >
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <main class="py-5">
      <router-view></router-view>
    </main>
  </div>
</template>

<script>
export default {
  name: 'app',

  methods: {
    logout() {
      this.$store.dispatch('authentication/logout');
      this.$router.push({ name: 'login' });
    }
  },

  computed: {
    isAuthenticated() {
      return this.$store.getters['authentication/isAuthenticated'];
    },

    userAuthenticatedName() {
      return this.$store.getters['authentication/userAuthenticatedName'];
    },
  },
};
</script>

<style lang="scss">
  $red-neon: #ff073a;
  
  .btn-outline-red-neon {
    color: $red-neon !important;
    border-color: $red-neon !important;
  }

  .truncate {
    overflow: hidden;
    text-overflow: ellipsis;
    width: 100%;
    white-space: nowrap;
  }
</style>