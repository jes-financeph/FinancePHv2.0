<template>
  <div @mouseover="checkUser">
    <b-navbar toggleable type="dark" variant="dark">
      <b-navbar-brand>Finance PH</b-navbar-brand>
      <b-navbar-brand v-if="loggedIn == true"
        >Welcome {{ userName }}!</b-navbar-brand
      >

      <b-navbar-toggle target="navbar-toggle-collapse">
        <template #default="{ expanded }">
          <b-icon
            v-if="expanded"
            @click="checkUser"
            icon="chevron-bar-up"
          ></b-icon>
          <b-icon v-else icon="chevron-bar-down"></b-icon>
        </template>
      </b-navbar-toggle>

      <b-collapse id="navbar-toggle-collapse" is-nav>
        <b-navbar-nav class="ml-auto">
          <router-link to="/"><li>Home</li> </router-link>
          <router-link v-if="loggedIn == false" to="/signup"
            ><li>Sign Up</li>
          </router-link>
          <router-link v-if="loggedIn == false" to="/login"
            ><li>Log-in</li>
          </router-link>
          <router-link v-if="loggedIn == true" to="/profile"
            ><li>Profile</li>
          </router-link>

          <li v-if="loggedIn == true" @click="logOut">Log Out</li>
          <router-link v-if="admin == true" to="/admin"
            ><li>Admin Panel</li>
          </router-link>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>
<script>
export default {
  data: () => ({
    drawer: false,
    loggedIn: false,
    admin: false,
    userName: null
  }),
  mounted() {
    window.setInterval(() => {
      this.userName = localStorage.getItem("user");
      const isAdmin = localStorage.getItem("user");

      if (isAdmin == "admin") {
        this.admin = true;
      } else {
        this.admin = false;
      }

      if (User.loggedIn()) {
        this.loggedIn = true;
      } else {
        this.loggedIn = false;
      }
    }, 10);
  },

  methods: {
    checkUser() {
      if (User.loggedIn()) {
        this.loggedIn = true;
      } else {
        this.loggedIn = false;
      }
    },
    logOut() {
      const userToken = localStorage.getItem("token");
      const axiosHeader = {
        Authorization: `Bearer ${userToken}`
      };
      this.axios
        .post("http://127.0.0.1:8000/api/auth/logout", "body", {
          headers: axiosHeader
        })
        .then(response => {
          console.log(response);
        })
        .catch(error => console.log(error));
      localStorage.clear();
      this.$swal({
        icon: "Success",
        title: "See you again!",
        text: "You have succesfully logged out!"
      });
      this.$router.push("/");
    }
  }
};
</script>

<style scoped>
li {
  text-decoration: none;
  color: white;
  list-style: none;
  cursor: pointer;
  padding-top: 15px;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}
a {
  text-decoration: none;
  color: white;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}
.router-link-active {
  color: white;
  text-decoration: none;
}
.router-link-exact-active {
  color: white;
  text-decoration: none;
}
.router-link {
  color: white;
  text-decoration: none;
}
</style>