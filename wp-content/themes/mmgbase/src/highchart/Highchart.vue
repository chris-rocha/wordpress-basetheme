<script>
  import {Chart} from 'highcharts-vue'
  import Highcharts from "highcharts";
  import highchartsMoreInit from "highcharts/highcharts-more";
  import highchartsAccessibilityInit from "highcharts/modules/accessibility";
  import solidGaugeInit from "highcharts/modules/solid-gauge";

  highchartsMoreInit(Highcharts);
  highchartsAccessibilityInit(Highcharts);
  solidGaugeInit(Highcharts);

  export default {
    name: "highchart",
    components: {
      chart: Chart
    },
    props: {
      chartdata() {
        return '';
      }
    },
    data: function () {
      return {
        defaultOptions: {
          credits: {
            enabled: false
          }
        }
      };
    },
    methods: {
      chartOptions() {
        var options = JSON.parse(this.chartdata);
        return {...this.defaultOptions, ...options};
      },
    },
    computed: {},
    mounted: function () {
      Highcharts.setOptions({
        lang: {
          thousandsSep: ','
        }
      });
    },
    watch: {}
  };
</script>
<template>
  <div class="chart" :class="chartOptions().chart.type">
    <div class="chart-wrapper">
      <chart class="chart-chart" :options="chartOptions()"></chart>
    </div>
    <p class="chart-description" v-if="chartOptions().description"
       v-html="chartOptions().description"></p>
  </div>
</template>
<style lang="scss">
  @import "../../scss/_vars.scss";
  @import "highcharts/css/highcharts.scss";

  .component.interactive-chart {
    .highcharts-container {
      margin: 0 auto;
      font-size:16px;
      * {
        font-family: $fontFamily !important;
      }
    }

    .chart-container {
      display:flex;
      flex-wrap:wrap;
    }

    .chart {
      display:block;
      margin: 0 auto 20px;
      width:100%;

      .chart-wrapper {
        max-width: 760px;
        min-height: 300px;
        flex: 1 1 60%;
      }

      .chart-description {
        padding:0 2em;
      }

      .highcharts-axis-labels {
        font-size:16px;
        fill: $dkgray;
      }

      &.solidgauge {

        flex: 1 0 300px;

        .chart-wrapper {
          min-height: 0;
          width:300px;
          margin:0 auto;
        }

        .highcharts-container:before {
          content: "USA";
          display: flex;
          align-items:center;
          justify-content:center;
          width: 2.5em;
          height: 2.5em;
          font-size:12px;
          background: $dkgray;
          color: white;
          border-radius: 50%;
          position:absolute;
          z-index:3;
          top:10%;
          left:50%;
          transform:translate(-50%,-50%);
          pointer-events: none;
        }

        .highcharts-container:after {
          content: "";
          width: 1px;
          height: 2em;
          background: $dkgray;
          color: white;
          position:absolute;
          z-index:2;
          top:10%;
          left:50%;
          transform:translate(-50%,0);
          pointer-events: none;
        }

        .highcharts-axis-title {
          font-size:1.5em;
        }
        .highcharts-data-label {
          font-size:1.5em;
        }
      }

      @media (max-width: $tabletWidth - 1) {
        .highcharts-axis-labels {
          font-size:14px;
        }
      }
    }
  }

  .component.interactive-chart g.highcharts-color-0 {
    .highcharts-point {
      fill: $gulf-blue !important;
    }
  }

  .component.interactive-chart g.highcharts-color-1 {
    .highcharts-point {
      fill: $charcoal !important;
    }
  }

  .component.interactive-chart g.highcharts-color-2 {
    .highcharts-point {
      fill: $calico-coral !important;
    }
  }

  .component.interactive-chart g.highcharts-color-3 {
    .highcharts-point {
      fill: $dark-blue !important;
    }
  }
</style>
