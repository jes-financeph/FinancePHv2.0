<template>
  <v-dialog v-model="dialog" width="700" height="500">
    <template v-slot:activator="{ on, attrs }">
      <v-btn
        color="white"
        v-bind="attrs"
        v-on="on"
        elevation="8"
        raised
        rounded
        class="ml-2"
        large
      >
        Update photo
      </v-btn>
    </template>

    <v-card>
      <br /><br />
      <imageengine />
      <br /><br />
    </v-card>
  </v-dialog>
</template>

<script>
import imageengine from "@/components/imageengine.vue";
export default {
  data() {
    return {
      dialog: false
    };
  },
  components: {
    imageengine
  }
};
</script>