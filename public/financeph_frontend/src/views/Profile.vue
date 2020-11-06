<template>
  <div>
    <section class="profilepage">
      <v-container v-if="name != null" class="updatecontainer">
        <v-card class="mt-10" color="#0353a4" raised
          ><br />
          <v-row justify="center" align="center">
            <v-col cols="8" xs="8" md="5" align-self="center">
              <p class="display-2 white--text">Update your Profile.</p>
            </v-col>
          </v-row>
          <v-row justify="center" align="center">
            <img
              v-if="photo == null"
              src="https://www.pacificlicensing.com/sites/default/files/brand/shrek.jpg"
              height="200px"
              width="200px"
            />
            <img
              v-if="photo !== null"
              :src="photo"
              height="200px"
              width="200px"
            />
            <br />
          </v-row>
          <v-row justify="center" align="center">
            <v-col cols="8" xs="8" md="5" align-self="center">
              <v-text-field
                dark
                v-model="email"
                placeholder="Fetching E-mail address"
                label="Email"
              ></v-text-field>
            </v-col>
          </v-row>
          <v-row justify="center" align="center">
            <v-col cols="8" xs="8" md="5" align-self="center">
              <v-text-field
                dark
                placeholder="Fetching name..."
                v-model="name"
                label="Name"
              ></v-text-field>
            </v-col>
          </v-row>
          <v-row justify="center" align="center">
            <v-btn
              class="mr-2"
              color="white"
              elevation="8"
              raised
              rounded
              large
              @click.prevent="profileUpdate"
              >Update Profile
            </v-btn>
            <imageupload />
          </v-row>
          <br /><br />
        </v-card>
      </v-container>
    </section>
  </div>
</template>

<script>
import imageupload from "@/components/imageupload.vue";

export default {
  data() {
    return {
      photo: null,
      email: null,
      name: null,
      id: null
    };
  },
  components: {
    imageupload
  },
  methods: {
    profileUpdate() {
      this.axios
        .put(`http://127.0.0.1:8000/api/userdata/${this.id}`, {
          email: this.email,
          name: this.name
        })
        .then(response => console.log(response))
        .then(
          this.$swal({
            position: "center",
            icon: "success",
            title: "Account Succesfully Updated",
            showConfirmButton: true,
            timer: 1500
          })
        )
        .catch(error => {
          this.$router.push("/");
          console.log(error);
        });
    }
  },
  created() {
    if (!User.loggedIn()) {
      this.$router.push("/signup");
    }
    const userToken = localStorage.getItem("token");
    const axiosHeader = {
      Authorization: `Bearer ${userToken}`
    };
    this.axios
      .post("http://127.0.0.1:8000/api/auth/me", "body", {
        headers: axiosHeader
      })
      .then(response => {
        console.log(response.data);
        this.name = response.data.name;
        this.email = response.data.email;
        this.id = response.data.id;

        //fetching photo
        if (response.data.photo !== null) {
          this.photo = require("../photodatabase/" + //Displaying correct path
            response.data.photo.slice(37, 56));
        } else if (response.data.photo == null) {
          this.photo = response.data.photo; //fallback to prevent error
        }
      })
      .catch(error => {
        console.log(error);
      });
  }
};
</script>

<style>
.updatecontainer {
  max-width: 750px;
}
.profilepage {
  height: 100vh;
  box-sizing: border-box;
  background-image: url("profile.jpg");
  background-color: #7e57c2;
  background-blend-mode: darken;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.vue-typer {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  font-size: clamp(1rem, 10vw, 80px);
  font-weight: bold;
  padding-top: 2.9em;
  color: white;
}
.vue-typer .custom.char.typed {
  color: white;
}
.vue-typer .custom.caret {
  width: 30px;
  height: 130px;
  background-color: #3f51b5;
}
.vue-typer .custom.char.selected {
  color: whitesmoke;
}
</style>