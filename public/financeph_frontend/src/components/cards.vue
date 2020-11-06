<template>
  <v-card
    raised
    dark
    class="mx-auto"
    max-width="344"
    outlined
    color="#43495f"
  >
    <v-list-item three-line>
      <v-list-item-content>
        <div class="overline mb-4">{{ crypto.CoinInfo.FullName }}</div>
        <v-list-item-title class="headline mb-1">{{
          crypto.CoinInfo.Name
        }}</v-list-item-title>
        <v-list-item-subtitle
          >Price: {{ crypto.DISPLAY.USD.PRICE }}<br />Change :
          {{ crypto.DISPLAY.USD.CHANGEDAY }}</v-list-item-subtitle
        >
      </v-list-item-content>

      <!-- <v-list-item-avatar tile size="80" -->
      <img
        style="height: 80px;"
        :src="`https://www.cryptocompare.com/${crypto.CoinInfo.ImageUrl}`"
      />
      <!-- </v-list-item-avatar> -->
    </v-list-item>

    <v-card-actions>
      <v-btn text>Save</v-btn>
      <v-btn text>Check</v-btn>
    </v-card-actions>
  </v-card>
</template>
<script>
export default {
  props: {
    crypto: Object
  }
};
</script>
