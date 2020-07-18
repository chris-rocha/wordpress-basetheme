import Vue from "vue";
import VueMq from 'vue-mq'
import Carousel from "./carousel/Carousel.vue";
Vue.config.productionTip = false;
Vue.config.devtools = true;
Vue.use(VueMq, {
  breakpoints: { // default breakpoints - customize this
    sm: 698,
    md: 960,
    lg: 1440,
    xl: Infinity,
  },
  defaultBreakpoint: 'sm' // customize this for SSR
});
const componentClass = '.carousel';
const nodelist = document.querySelectorAll(`.component${componentClass}`);
const elements = Array.prototype.slice.call(nodelist);
elements.forEach(ele => {
  const selector = `.component${componentClass}[data-asset-id="${ele.dataset.assetId}"]`;
  new Vue({
    el: selector,
    data:()=>({assetId:ele.dataset.assetId}),
    components: {
      Carousel
    }
  });
});
