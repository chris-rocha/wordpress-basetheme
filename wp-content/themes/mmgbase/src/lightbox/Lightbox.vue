<script>
export default {
  name: "Lightbox",
  props: {
    activate: {
      type: Boolean,
      default: false
    },
    lightboxType: {
      //use this to change Lightbox styles
      type: String,
      default: "ImageGallery"
    }
  },
  data() {
    return {
      active: false
    };
  },
  watch: {
    activate() {
      this.active = this.activate;
      if (this.active) {
        // disableBodyScroll(this.$el);
        document.body.classList.add("freeze");
      } else {
        // enableBodyScroll(this.$el);
        document.body.classList.remove("freeze");
      }
    }
  },
  methods: {
    open() {
      this.active = true;
      this.$emit("open");
    },
    close() {
      this.active = false;
      this.$emit("close");
    },
    toKebab: str =>
      str
        .replace(/([a-z0-9])([A-Z])/g, "$1-$2")
        .replace(/([A-Z])([A-Z])(?=[a-z])/g, "$1-$2")
        .toLowerCase()
  },
  mounted: function() {
    document.body.appendChild(this.$el);
    document.addEventListener("keydown", e => {
      if (e.keyCode == 27) {
        this.close();
      }
    });
  }
};
</script>

<template>
  <div :class="toKebab(lightboxType)">
    <transition name="lightbox-fade">
      <div
        v-show="active"
        class="lightbox-backdrop"
        role="dialog"
        aria-labelledby="lightboxTitle"
        aria-describedby="lightboxDescription"
      >
        <div class="lightbox-content">
          <header class="lightbox-header center-text" id="lightboxTitle">
            <div class="container">
              <button
                class="lightbox-close pa-1 flex center color white"
                type="button"
                @click="close"
                aria-label="Close lightbox"
              >
                <i class="material-icons" aria-hidden="true">close</i>
              </button>
              <slot name="header"></slot>
            </div>
          </header>
          <section class="lightbox-body" id="lightboxDescription">
            <div class="container">
              <slot name="body"></slot>
            </div>
          </section>
          <footer class="lightbox-footer ca">
            <slot name="footer"></slot>
            <!--button type="button" @click="close" aria-label="Close lightbox">ADA Close</button-->
          </footer>
        </div>
      </div>
    </transition>
  </div>
</template>
