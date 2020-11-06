<template>
  <v-app>
    <appbarmobile />
    <v-main>
      <transition
        mode="out-in"
        enter-active-class="animate__animated animate__fadeIn animate__delay-1.5s"
        leave-active-class="animate__animated animate__fadeOut animate__delay-1.5s"
      >
        <router-view />
      </transition>
    </v-main>
  </v-app>
</template>

<script>
import appbarmobile from "@/components/appbarmobile.vue";
export default {
  name: "App",
  components: { appbarmobile },

  data() {
    return {
      Render: true
    };
  }
};
</script>
<style>
.v-main {
  background-color: #30364e;
  margin: 0;
}
</style>
