import Vue from "vue";
import Highchart from "./highchart/Highchart.vue";
Vue.config.productionTip = false;
Vue.config.devtools = true;
const componentClass = '.interactive-chart';
const nodelist = document.querySelectorAll(`.component${componentClass}`);
const elements = Array.prototype.slice.call(nodelist);
elements.forEach(ele => {
  new Vue({
    el: ele,
    components: {
      Highchart,
    }
  });
});
