<template>
  <section class="section portfolio-container">
    <v-container>
      <v-row class="py-5 py-md-8">
        <v-col cols="12">
          <h3 class="section-subtitle mb-3">{{ $t("portfolio.subTitle") }}</h3>
          <h2 class="section-title mb-6">{{ $t("portfolio.title") }}</h2>
        </v-col>
      </v-row>
      <v-row class="mb-12">
        <h3 class="section-subtitle mb-3">
          {{ $t("portfolio.graphicSectionTitle") }}
        </h3>
        <v-col cols="12">
          <swiper
            :slides-per-view="slidesPerPage"
            :space-between="16"
            navigation
            @swiper="onSwiper"
            @slideChange="onSlideChange"
          >
            <swiper-slide>
              <v-card>
                <v-btn to="/portfolio/graphic" variant="text">{{
                  $t("portfolio.gotoGraphicPortfolio")
                }}</v-btn>
              </v-card>
            </swiper-slide>
            <swiper-slide v-for="slide in selectedFiles.graphic" :key="slide">
              <v-card>
                <img
                  :src="`http://localhost:8888/mw-vue/portfolio/graphic/${slide}`"
                />
              </v-card>
            </swiper-slide>
          </swiper>
        </v-col>
      </v-row>
      <v-row>
        <h3 class="section-subtitle mb-3">
          {{ $t("portfolio.uiSectionTitle") }}
        </h3>
        <v-col cols="12">
          <swiper
            :slides-per-view="slidesPerPage"
            :space-between="16"
            navigation
            @swiper="onSwiper"
            @slideChange="onSlideChange"
          >
            <swiper-slide>
              <v-card>
                <v-btn to="/portfolio/ui" variant="text">{{
                  $t("portfolio.gotoUiPortfolio")
                }}</v-btn>
              </v-card>
            </swiper-slide>
            <swiper-slide v-for="slide in selectedFiles.ui" :key="slide">
              <v-card>
                <img
                  :src="`http://localhost:8888/mw-vue/portfolio/ui/${slide}`"
                /> </v-card
            ></swiper-slide>
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
import { mapGetters } from "vuex";
export default {
  name: "portfolio-component",
  components: {
    Swiper,
    SwiperSlide,
  },
  computed: {
    ...mapGetters("portfolio", ["portfoliosPreview"]),
    slidesPerPage() {
      let result = 2;
      if (this.$vuetify.display.smAndUp) result = 3;
      if (this.$vuetify.display.lgAndUp) result = 4;
      return result;
    },
    selectedFiles() {
      return {
        ui: this.$store.getters["portfolio/portfoliosPreview"]("ui"),
        graphic: this.$store.getters["portfolio/portfoliosPreview"]("graphic"),
      };
    },
  },
  async mounted() {
    if (this.selectedFiles.ui.length === 0) {
      await this.$store.dispatch("portfolio/loadPortfolio", "ui");
    }
    if (this.selectedFiles.graphic.length === 0) {
      await this.$store.dispatch("portfolio/loadPortfolio", "graphic");
    }
  },
  methods: {
    onSwiper() {},
    onSlideChange() {},
  },
};
</script>
<style lang="scss">
@import "@/assets/styles/portfolio";
</style>
