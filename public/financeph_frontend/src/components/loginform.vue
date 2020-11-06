<template>
  <v-form>
    <v-container class="mycontainer">
      <v-card color="#43495f" raised>
        <br />
        <v-row justify="center" align="center">
          <v-col cols="10" xs="10" md="5">
            <p class="display-1 white--text">Login Form</p>
          </v-col>
        </v-row>

        <v-row justify="center">
          <v-col cols="10" xs="10" md="5" align-self="center">
            <v-text-field
              dark
              v-model="email"
              label="Email address"
            ></v-text-field>
          </v-col>
        </v-row>
        <v-row justify="center">
          <v-col cols="10" xs="10" md="5" align-self="center">
            <v-alert dense v-if="errors.email" type="error">
              {{ errors.email[0] }}
            </v-alert>
          </v-col>
        </v-row>
        <v-row justify="center">
          <v-col cols="10" xs="10" md="5" align-self="center">
            <v-text-field
              dark
              v-model="password"
              label="Password"
              type="password"
            ></v-text-field>
          </v-col>
        </v-row>
        <v-row justify="center">
          <v-col cols="10" xs="10" md="5" align-self="center">
            <v-alert dense v-if="errors.password" type="error">
              {{ errors.password[0] }}
            </v-alert>
          </v-col>
        </v-row>
        <v-row justify="center">
          <v-btn shaped dark large tile color="#7373ff" @click.prevent="submit">
            Log in
          </v-btn>
        </v-row>
        <br />
      </v-card>
    </v-container>
  </v-form>
</template>
<script>
export default {
  data() {
    return {
      email: null,
      password: null,
      errors: {}
    };
  },
  created() {
    if (User.loggedIn()) {
      this.$swal({
        icon: "error",
        title: "Oops...",
        text: "You are already logged in!",
        footer: `You cannot access this page.`
      });
      this.$router.push("/");
    }
  },
  methods: {
    submit() {
      // In case of emergency: this.email == "admin@gmail.com" && this.password == "admin"

      this.axios
        .post("http://127.0.0.1:8000/api/auth/login", {
          email: this.email,
          password: this.password
        })
        .then(response => User.responseAfterLogin(response))
        .then(response => {
          this.$swal({
            position: "center",
            icon: "success",
            title: "Log in succesful",
            showConfirmButton: true,
            timer: 1500
          }),
            this.$router.push("/profile");
        })

        .catch(error => {
          this.errors = error.response.data.errors;
          if (!this.errors) {
            this.$swal({
              icon: "error",
              title: "Oops...",
              text: "Account not found!",
              footer: `If you don't have an account, please  register.`
            });
          }
        });
    }
  }
};
</script>
<style  scoped>
.container {
  max-width: 750px;
}
</style>