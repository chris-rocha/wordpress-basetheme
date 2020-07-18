import Vue from "vue";
import VideoPlayer from "./video-player/VideoPlayer.vue";import VueYouTubeEmbed from 'vue-youtube-embed'
Vue.use(VueYouTubeEmbed)
// if you don't want install the component globally
// Vue.use(VueYouTubeEmbed, { global: false })
Vue.config.productionTip = false;
Vue.config.devtools = true;
const componentClass = '.video-player';
const nodelist = document.querySelectorAll(`.component${componentClass}`);
const elements = Array.prototype.slice.call(nodelist);
elements.forEach(ele => {
  const selector = `.component${componentClass}[data-asset-id="${ele.dataset.assetId}"]`;
  new Vue({
    el: selector,
    data:()=>({assetId:ele.dataset.assetId}),
    components: {
      VideoPlayer,
    }
  });
});
