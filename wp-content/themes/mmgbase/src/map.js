import Vue from "vue";
import VueMap from "./map/Map.vue";
Vue.config.productionTip = false;
Vue.config.devtools = true;
Vue.component('vue-map', VueMap);
new Vue({
  el: '.node-profile.full .map-lightbox'
});
