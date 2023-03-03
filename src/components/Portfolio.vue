<template>
  <section class="section portfolio-container">
    <v-container>
      <v-row class="py-5 py-md-8">
        <v-col cols="12">
          <h3 class="section-subtitle mb-3">{{ $t("portfolio.subTitle") }}</h3>
          <h2 class="section-title mb-6">{{ $t("portfolio.title") }}</h2>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12">
          <swiper
            :slides-per-view="3"
            :space-between="12"
            navigation
            :pagination="{ clickable: true }"
            @swiper="onSwiper"
            @slideChange="onSlideChange"
          >
            <swiper-slide v-for="slide in selectedFiles" :key="slide"
              ><img
                :src="`http://localhost:8888/mw-vue/portfolio/graphic/${slide}`"
            /></swiper-slide>
            <swiper-slide><a href="">go to portfolio</a></swiper-slide>
          </swiper>
        </v-col>
      </v-row>
    </v-container>
  </section>
</template>

<script>
import SwiperCore, { Navigation } from "swiper";
import { Swiper, SwiperSlide } from "swiper/vue";
SwiperCore.use([Navigation]);
export default {
  name: "portfolio-component",
  components: {
    Swiper,
    SwiperSlide,
  },
  data() {
    return {
      files: undefined,
      selectedFiles: [],
      slidesPerPage: 1,
    };
  },
  async mounted() {
    let headers = new Headers();
    this.files = await fetch("http://localhost:8888/mw-vue/api/filelist.php", {
      method: "get",
      headers: headers,
    })
      .then(function (response) {
        return response.json();
      })
      .then(function (data) {
        return data;
      })
      .catch((err) => {
        console.log(err);
      });
    this.selectedFiles = [];
    for (let i = 0; i < 3; i++) {
      let photo =
        this.files[Math.floor(Math.random() * this.files.length)].split("/");
      this.selectedFiles.push(photo[photo.length - 1]);
    }
  },
  methods: {
    onResize() {
      this.windowSize = { x: window.innerWidth, y: window.innerHeight };
    },
    onSwiper() {},
    onSlideChange() {},
  },
};
</script>
<style lang="scss">
@import "@/assets/styles/portfolio";
@import "@/assets/styles/swiper.min.css";
@import "@/assets/styles/navigation.min.css";
</style>
