<template>
  <v-container>
    <v-row align="start" justify="center">
      <v-col>
        <formcomponent />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import formcomponent from "@/components/formcomponent";
export default {
  components: {
    formcomponent
  }
};
</script>

