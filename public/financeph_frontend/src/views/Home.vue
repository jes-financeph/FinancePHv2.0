<template>
  <div>
    <section class="fwh-slide">
      <v-container>
        <v-row justify="center" align="center">
          <vue-typer
            :text="['Innovation', 'Solutions', 'FinancePH']"
            :repeat="Infinity"
            :shuffle="false"
            initial-action="typing"
            :pre-type-delay="70"
            :type-delay="70"
            :pre-erase-delay="2000"
            :erase-delay="250"
            erase-style="select-all"
            :erase-on-complete="false"
            caret-animation="smooth"
          ></vue-typer>
        </v-row>
        <v-row v-scroll-to="'#cryptosection'" justify="center" align="center">
          <v-btn class="mr-2" color="white" elevation="8" raised rounded x-large
            >See crypto
          </v-btn>
          <v-btn
            to="/signup"
            color="white"
            elevation="8"
            raised
            rounded
            class="ml-2"
            x-large
            >Join us
          </v-btn></v-row
        >
      </v-container>
    </section>
    <section id="cryptosection" class="fwh-slide2">
      <v-container>
        <v-row align="start" justify="center">
          <v-col
            v-for="(cryptoItem, index) in crypto"
            :key="cryptoItem.index"
            cols="12"
            xs="12"
            sm="6"
            md="4"
            lg="3"
          >
            <cards :crypto="cryptoItem" :index="index" />
          </v-col>
        </v-row>
      </v-container>
    </section>
  </div>
</template>

<script>
import cards from "@/components/cards.vue";

export default {
  data() {
    return {
      crypto: []
    };
  },
  components: { cards },
  mounted() {
    this.axios
      .get(
        "https://min-api.cryptocompare.com/data/top/totalvolfull?limit=20&tsym=USD&api_key=925393dee2466678c0f80b50b2c3b361461af3b85aa446cdd62772d01218ad22"
      )
      .then(response => {
        this.crypto = response.data.Data;
        console.log(response.data.Data);
      })
      .catch(error => console.log(error));
  }
};
</script>
<style >
.fwh-slide {
  height: 100vh;
  box-sizing: border-box;
  background-image: url("finance.jpg");
  background-color: #607d8b;
  clip-path: polygon(
    63% 0,
    100% 0,
    100% 65%,
    69% 91%,
    23% 99%,
    0 100%,
    0 54%,
    14% 20%
  );
  background-blend-mode: screen;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.fwh-slide2 {
  box-sizing: border-box;
  background-color: #30364e;
}
.vue-typer {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  font-size: clamp(1rem, 10vw, 80px);
  font-weight: bold;
  padding-top: 2.9em;
  color: #424242;
}
.vue-typer .custom.char.typed {
  color: rgba(0, 0, 0, 0.7);
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
