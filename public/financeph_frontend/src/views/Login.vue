<template>
  <v-container>
    <v-row align="start" justify="center">
      <v-col>
        <loginform />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import loginform from "@/components/loginform";
export default {
  components: {
    loginform
  }
};
</script>

