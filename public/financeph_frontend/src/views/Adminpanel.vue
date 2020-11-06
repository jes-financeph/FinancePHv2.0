<template>
  <div>
    <v-container>
      <v-row justify="center" align="center">
        <p class=" mt-15 display-3 white--text">Admin Panel</p>
      </v-row>
      <v-row class="mt-10" justify="center" align="center">
        <admintable v-if="userdata.length" :userdata="userdata" />
      </v-row>
    </v-container>
  </div>
</template>

<script>
import admintable from "@/components/admintable";
export default {
  data() {
    return {
      userdata: [],
      isAdmin: false
    };
  },
  created() {
    const isAdmin = localStorage.getItem("user");
    if (isAdmin == "admin") {
      this.admin = true;
    } else {
      this.$swal({
        icon: "error",
        title: "Oops...",
        text: "You do not have Admin Access!",
        footer: `Please ask permission from the Administrator`
      });
      this.$router.push("/");
    }
  },
  mounted() {
    this.axios
      .get("http://127.0.0.1:8000/api/userdata")
      .then(response => {
        (this.userdata = response.data), console.log(response);
      })
      .catch(error => console.log(error));
  },
  components: {
    admintable
  }
};
</script>

<style lang="scss" scoped>
</style>