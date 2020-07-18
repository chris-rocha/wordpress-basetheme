import Vue from "vue";
import ImageGallery from "./image-gallery/ImageGallery.vue";
Vue.config.productionTip = false;
Vue.config.devtools = true;
const sel = "#img-gallery-vue";
if (document.querySelector(sel)) {
  new Vue({
    render: h => h(ImageGallery),
  }).$mount(sel)
}
