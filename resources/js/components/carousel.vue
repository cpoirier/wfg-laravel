<template>
  <div class="wfg-carousel">
    <div class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li v-for="cdata in carousel_data">
            </li>
        </ol>
        <div class="carousel-inner">
          <div 
            v-for="cdata in carousel_data"
              class="carousel-item">
              {{ cdata }}
          </div>
        </div>
        <a class="carousel-control-prev" href="#" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
  </div>
</template>

<script>
  export default {
    mounted() {
      console.log("Carousel mounted.")
    },
    render: function (createElement) {
      return createElement(
        'h' + this.carousel_data,
        this.$slots.default
      )
    },
    props: ['new_id', 'carousel_data'],
    methods: {
    },
    data() {
      return {
      };
    },
    computed: {
    }
  }
</script>

<style>
  .wfg-carousel { margin-top: 20px; }
</style>