<template>
  <v-form>
    <v-container class="mycontainer">
      <v-card color="#43495f" raised="true">
        <br />
        <v-row justify="center" align="center">
          <v-col cols="10" xs="10" md="5">
            <p class="display-1 white--text">Registration Form</p>
          </v-col>
        </v-row>
        <v-row justify="center">
          <v-col cols="10" xs="10" md="5" align-self="center">
            <v-text-field dark v-model="name" label="Full Name"></v-text-field>
          </v-col>
        </v-row>
        <v-row justify="center">
          <v-col cols="10" xs="10" md="5" align-self="center">
            <v-alert dense v-if="errors.name" type="error">
              {{ errors.name[0] }}
            </v-alert>
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
          <v-col cols="10" xs="10" md="5" align-self="center">
            <v-text-field
              dark
              v-model="password_confirmation"
              label="Confirm Password"
              type="password"
            ></v-text-field>
          </v-col>
        </v-row>
        <v-row justify="center">
          <v-checkbox
            dark
            v-model="checkbox1"
            :label="`Agree to Terms & conditions`"
          ></v-checkbox>
        </v-row>
        <v-row justify="center">
          <v-btn
            v-if="checkbox1 == false"
            shaped
            dark
            large
            tile
            color="#7373ff"
            disabled
          >
            Submit
          </v-btn>
          <v-btn
            v-else-if="checkbox1 == true"
            shaped
            dark
            large
            tile
            color="#7373ff"
            @click.prevent="submit"
          >
            Submit
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
      name: null,
      email: null,
      password: null,
      password_confirmation: null,
      checkbox1: false,
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
      this.axios
        .post("http://127.0.0.1:8000/api/auth/signup", {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation
        })

        .then(response => {
          console.log(response);
          this.$swal({
            position: "center",
            icon: "success",
            title: "You have succesfully registered",
            showConfirmButton: true,
            timer: 1500
          });
          this.$router.push("/");
        })
        .catch(error => {
          this.errors = error.response.data.errors;
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