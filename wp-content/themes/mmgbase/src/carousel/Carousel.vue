
<template>
  <div class="mmg-slider py-5">
    <div class="flex">
      <div class="cell alpha" :class="$mq==='sm'?'px-4':'pr-4'">
        <h2 class="heading mb-2" :class="{'ca':$mq==='sm'}">{{ headline }}</h2>
        <div class="desc" :class="{'ca':$mq==='sm'}" v-html="summary"></div>
        <div class="nav-arrows full-width flex" :class="{'center':$mq==='sm'}">
          <button
            @click="prev"
            class="transparent pa-1 mx-1 mb-4 fill teal slider-prev slider-arrow flex center"
            aria-label="See previous card"
          >
            <i class="material-icons arrow-left text--white" aria-hidden="true">arrow_back</i>
          </button>
          <button
            @click="next"
            class="transparent pa-1 mx-1 mb-4 fill teal slider-next slider-arrow flex center"
            aria-label="See next card"
          >
            <i class="material-icons arrow-right text--white" aria-hidden="true">arrow_forward</i>
          </button>
        </div>
      </div>
      <div class="cell omega cards">
        <div class="inner-wrapper flex">
          <ul>
            <slick :options="sliderOptions" @init="slickMounted" @beforeChange="onBefore" ref="slick">
              <li
                class="py-1 px-2"
                v-for="(card, j) in getCards()"
                :key="j"
                :class="{ 'active' : j === active}"
              >
                <div class="card px-3 py-5 ca pointer">
                  <span v-html="card.icon" />
                  <div
                    v-if="card.headline"
                    class="heading4 full-width heading text--navy mt-3 mb-2"
                  >{{card.headline}}</div>
                  <a
                    v-if="card.link"
                    :href="card.link.url"
                    class="button outlined cta"
                    v-bind="card.attributes"
                  >{{card.link.title}}</a>
                </div>
              </li>
            </slick>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Slick from "vue-slick";

export default {
  name: "CardSlider",
  data() {

    return {
      /* eslint-disable no-undef */
      minimumCards: 8,
      smBreakpoint: 698, //this needs to match "this.$mq.sm" dimensions found in carousel.js
      headline: window[this.$root.assetId].heading,
      summary: window[this.$root.assetId].summary,
      slides: window[this.$root.assetId].carouselItems,
      sliderOptions: {
        dots: false,
        arrows: false,
        variableWidth: true,
        accessibility: true,
        focusOnSelect: true,
        // infinite: true,
        speed: 500,
        centerMode: false,
        slidesToScroll: 1,
        swipeToSlide: true,
        touchThreshold: 5,
        responsive: [
          {
            breakpoint: 698,
            settings: { centerMode: true, centerPadding: 0, slidesToShow: 3 }
          }
        ]
      }
    };
  },
  components: {
    Slick
  },
  methods: {
    getCards(arr) {
      arr = arr || this.slides;
      const n = this.minimumCards;
      // if(arr.length > n && arr.length !== this.cards){
      //   arr = arr.slice(0, this.minimum)
      // }
      return arr.length < n ? this.getCards(arr.concat(this.slides)) : arr;
    },
    prev() {
      this.$refs.slick.prev();
    },
    next() {
      this.$refs.slick.next();
    },
    goTo(n) {
      this.$refs.slick.goTo(n, true);
    }
  },
  mounted() {},
  computed: {}
};
</script>
