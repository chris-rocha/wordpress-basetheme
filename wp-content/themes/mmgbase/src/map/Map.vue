<template>
  <div class="full-width flex center mt-2">
    <button class="expand-map" @click="openLightbox" aria-label="Open Map">Expand Map</button>
    <lightbox :activate="lightboxActive" :lightbox-type="$options.name" @close="closeLightbox">
      <template v-slot:body>
        <slot name="map" class="map full-width fill black"/>
      </template>
    </lightbox>
  </div>
</template>

<script>
import Lightbox from "../lightbox/Lightbox";
export default {
  name: "Map",
  components: { Lightbox },
  data: function() {
    return {
      /* eslint-disable no-undef */
      lightboxActive: false
    };
  },
  methods: {
    openLightbox() {
      this.lightboxActive = true;
    },
    closeLightbox() {
      this.lightboxActive = false;
    }
  },
  computed: {},
  mounted: function() {
    this.loading = false;
    document.addEventListener("keydown", e => {
      const expandBtn = e.target.classList.contains("expand-map");
      if (e.keyCode == 27) {
        this.closeLightbox();
      }
      if (expandBtn) {
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
