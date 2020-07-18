<script>
import Lightbox from "../lightbox/Lightbox";
export default {
  name: "VideoPlayer",
  components: { Lightbox },
  data: function() {
    return {
      /* eslint-disable no-undef */
      loading: true,
      lightboxActive: false,
      embedCode: drupalSettings.asset[this.$root.assetId].embedCode,
      eyebrow: drupalSettings.asset[this.$root.assetId].eyebrow,
      heading: drupalSettings.asset[this.$root.assetId].heading,
      poster: drupalSettings.asset[this.$root.assetId].poster,
      summary: drupalSettings.asset[this.$root.assetId].shortDescription
    };
  },
  methods: {
    // onIframeLoad() {
    //   //TODO hook this up correctly
    //   Drupal.behaviors.YoutubeGTM.onYouTubeIframeAPIReady();
    // },
    openLightbox() {
      this.lightboxActive = true;
    },
    closeLightbox() {
      this.lightboxActive = false;
    }
    // ,
    // formatUrl: code =>
    //   `https://www.youtube.com/embed/${code}?rel=0&amp;enablejsapi=1&amp;controls=1&amp;showinfo=0&amp;modestbranding=1&amp;wmode=transparent&amp;listType=search`
  },
  computed: {},
  mounted: function() {
    this.loading = false;
    document.addEventListener("keydown", e => {
      const imgContainer = e.target.classList.contains("img-container");
      if (e.keyCode == 27) {
        this.closeLightbox();
      }
      if (imgContainer) {
        if (e.keyCode == 13) {
          this.openLightbox();
        }
      }
    });
  },
  watch: {
    // eslint-disable-next-line no-unused-vars
    lightboxActive(newVal, oldVal) {
      if (newVal) {
        // eslint-disable-next-line no-console
        console.log("opening LB");
      } else {
        // eslint-disable-next-line no-console
        console.log("closing LB");
      }
    }
  }
};
</script>
<template>
  <div>
    <div class="content flex">
      <div
        class="cell alpha img-container rel pointer"
        @click="openLightbox"
        aria-label="Open Video"
        tabindex="0"
      >
        <figure
          :src="poster"
          class="video poster box-shadow"
          :style="'background:url('+poster+') center center / cover no-repeat;'"
        />
        <i
          class="material-icons icon-play text-shadow abs-center color white"
          aria-label="play"
          aria-hidden="true"
        >play_arrow</i>
      </div>
      <div class="cell omega la py-3 pl-5">
        <div class="heading6 eyebrow color white all-caps mb-1" v-text="eyebrow" />
        <h2 class="heading color white" v-text="heading" />
        <p class="summary color white" v-html="summary" />
      </div>
    </div>
    <lightbox :activate="lightboxActive" :lightbox-type="$options.name" @close="closeLightbox">
      <template v-slot:header>
        <h3 class="color white">{{ heading|t }}</h3>
      </template>
      <template v-slot:body>
        <div class="video full-width fill black">
          <youtube
            v-if="lightboxActive"
            player-width="100%"
            player-height="100%"
            :video-id="embedCode"
            :player-vars="{ autoplay: 1 }"
            ref="youtube"
          ></youtube>
        </div>
      </template>
    </lightbox>
  </div>
</template>
<style lang="scss" scoped>
@import "../../scss/_vars.scss";
.icon-play {
  font-size: 85px;
  text-shadow: 0 2px 5px rgba(black, 0.15);
}
.alpha {
  flex: 1.25;
}
.omega {
  flex: 1;
  .heading {
    color: white;
  }
}
@media (max-width: $tabletWidth - 1) {
  .content.flex {
    flex-direction: column-reverse;
  }
  .alpha {
    flex: 1;
  }
  .omega {
    padding-left: 0;
    padding-right: 0;
    text-align: center;
  }
}
</style>
