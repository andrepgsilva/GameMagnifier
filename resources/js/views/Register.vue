<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Register</div>

          <div class="card-body">
            <form method="POST" @submit.prevent="login">
              <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                <div class="col-md-6">
                  <input
                    id="username"
                    type="username"
                    class="form-control"
                    name="username"
                    autocomplete="username"
                    v-model="username"
                    v-validate="'required'"
                  />
                  <div class="mt-1">
                    <span class="text-danger">{{ errors.first('username') }}</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                <div class="col-md-6">
                  <input
                    id="email"
                    type="email"
                    class="form-control"
                    name="email"
                    autocomplete="email"
                    v-model="email"
                    v-validate="'required|email'"
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
                    v-validate="'required|min:8'"
                  />
                  <div class="mt-1">
                    <span class="text-danger">{{ errors.first('password') }}</span>
                  </div>

                  <div v-if="errorMessages" class="mt-3">
                    <div v-for="(value, key) in errorMessages" :key="key">
                      <span class="mt-1 text-danger">{{ value[0] }}</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button 
                    type="submit"
                    class="btn btn-primary"
                    @click.prevent="register"
                  >
                    Register
                  </button>
                  <a class="btn text-primary" @click.prevent="login">Already have an account?</a>
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
  name: "register",

  data() {
    return {
      username: '',
      email: '',
      password: '',
      errorMessages: [],
    }
  },

  methods: {
    register() {
      this.$validator.validate().then(valid => {
        if (valid) {
          this.$store.dispatch('authentication/register', {
            name: this.username,
            email: this.email,
            password: this.password,
          })
          .then(response => {
            this.$router.push({ name: 'login' })
          })
          .catch(error => {
            console.log(error);
            this.errorMessages = Object.values(error.response.data.errors);
          });
        }
      });

    },

    login() {
      return this.$router.push({ name: "login" });
    }
  }
};
</script>

<style>
</style>