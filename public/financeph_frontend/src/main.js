import Vue from "vue";
import App from "./App.vue";
import "./registerServiceWorker";
import router from "./router";
import store from "./store";
import vuetify from "./plugins/vuetify";
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueScrollTo from 'vue-scrollto'
import VueTyperPlugin from 'vue-typer'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import 'animate.css'
import User from './helpers/User'
import VueUploadComponent from 'vue-upload-component'
import VueCropper from 'vue-cropperjs';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'cropperjs/dist/cropper.css';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'



window.User = User


Vue.component('file-upload', VueUploadComponent)
Vue.config.productionTip = false;
Vue.component(VueCropper);
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(VueTyperPlugin)
Vue.use(VueAxios, axios)
Vue.use(VueSweetalert2);
Vue.use(VueScrollTo, {
  container: "body",
  duration: 1800,
  easing: "ease",
  offset: 0,
  force: true,
  cancelable: true,
  onStart: false,
  onDone: false,
  onCancel: false,
  x: false,
  y: true
})



new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount("#app");


