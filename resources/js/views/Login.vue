<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Login</div>

          <div class="card-body">
            <form method="POST" @submit.prevent="login">
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                <div class="col-md-6">
                  <input
                    id="email"
                    type="email"
                    class="form-control"
                    name="email"
                    autocomplete="email"
                    autofocus
                    v-model="email"
                    v-validate="'required'"
                  />
                  <div class="mt-1">
                    <span class="text-danger">{{ errors.first('email') }}</span>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                  <input
                    id="password"
                    type="password"
                    class="form-control"
                    name="password"
                    autocomplete="current-password"
                    v-model="password"
                    v-validate="'required'"
                  />
                  <div class="mt-1">
                    <span class="text-danger">{{ errors.first('password') }}</span>
                  </div>

                  <div v-if="errorMessages" class="mt-1">
                    <div v-for="(value, key) in errorMessages" :key="key">
                      <span class="text-danger">{{ value[0] }}</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">Login</button>
                  <a class="btn text-primary" @click.prevent="register">No account? Create one!</a>
                  <!-- <a class="btn btn-link" href>Forgot Your Password?</a> -->
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
	'name': 'login',

  data() {
    return {
      email: '',
      password: '',
      errorMessages: [],
    }
  },

	methods: {
		login() {
      this.$validator.validate().then(valid => {
        if (valid) {
          this.$store.dispatch('authentication/login', {
            email: this.email,
            password: this.password,
          })
          .then(() => {
            this.$store.dispatch('authentication/getAuthUser');
    
            this.$router.push({ name: 'home' });
          })
          .catch(error => {
            this.errorMessages = Object.values(error.response.data.errors);
          });
        }
      });
    },
    
    logout() {
      this.$store.dispatch('authentication/logout');
      this.$router.push({ name: 'login' });
    },

    register() {
      this.$router.push({ name: 'register' });
    }
  },
};
</script>

<style>
</style>