<script>
import Lightbox from "../lightbox/Lightbox";
export default {
  name: "ImageGallery",
  components: { Lightbox },
  data: function() {
    return {
      /* eslint-disable no-undef */
      loading: true,
      lightboxActive: false,
      animationName: "fade",
      active: 0,
      gallery: drupalSettings.listing.gallery
    };
  },
  methods: {
    openLightbox() {
      this.lightboxActive = true;
    },
    closeLightbox() {
      this.lightboxActive = false;
    },
    prev() {
      this.active = this.looper(1);
      this.animationName = "slide-right";
    },
    next() {
      this.active = this.looper(-1);
      this.animationName = "slide-left";
    },
    goTo(n) {
      // eslint-disable-next-line no-console
      console.log("goto: " + n);
      this.animationName = this.active > n ? "slide-right" : "slide-left";
      this.active = n;
    },
    looper(dir) {
      const arr = this.gallery;
      const len = arr.length;
      return (this.active + ((dir * -1) % len) + len) % len;
    }
  },
  computed: {},
  mounted: function() {
    this.loading = false;
    document.addEventListener("keydown", e => {
      const element = e.target.classList.contains("gallery-button");
      if (e.keyCode == 27) {
        this.closeLightbox();
      }
      if (element) {
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
  <div class="cell">
    <button @click="openLightbox" class="gallery-btn">View Gallery</button>
    <lightbox :activate="lightboxActive" :lightbox-type="$options.name" @close="closeLightbox">
      <template v-slot:header>
        <h3 class="color white">{{ heading|t }}</h3>
      </template>
      <template v-slot:body>
        <div class="gallery full-width rel flex center col">
          <button
            class="prev unstyle flex center material-icons color white pa-1"
            @click="prev"
          >chevron_left</button>
          <transition :name="animationName" mode="out-in">
            <figure class="full-width flex center" :key="active">
              <img class="" :src="gallery[active]" alt />
            </figure>
          </transition>
          <div class="dots flex my-3">
            <button
              v-for="(dot,i) in gallery"
              :key="'dot-'+i"
              class="dot unstyle"
              :aria-label="'Go To Slide ' + (i+1)"
              :class="{'active':active==i}"
              @click="goTo(i)"
            ></button>
          </div>
          <button
            class="next unstyle flex center material-icons color white pa-1"
            @click="next"
          >chevron_right</button>
        </div>
      </template>
    </lightbox>
  </div>
</template>
