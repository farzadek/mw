<template>
  <section class="section packages-container" id="packagesSection">
    <v-container>
      <v-row class="py-5 py-md-8">
        <v-col cols="12">
          <h3 class="section-subtitle mb-3">{{ $t("packages.subTitle") }}</h3>
          <h2 class="section-title mb-6">{{ $t("packages.title") }}</h2>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12"> <v-form></v-form></v-col>
      </v-row>
      <v-row>
        <v-col cols="12">
          <swiper
            :slides-per-view="packagesPerPage"
            :space-between="16"
            navigation
            @swiper="onSwiper"
            @slideChange="onSlideChange"
          >
            <swiper-slide
              v-for="thePackage in packages"
              :key="thePackage.class"
            >
              <v-card :title="thePackage.name" :subtitle="thePackage.price">
                <ul>
                  <li v-for="(elem, index) in thePackage.includes" :key="index">
                    {{ elem }}
                  </li>
                </ul>
              </v-card>
            </swiper-slide>
          </swiper>
        </v-col>
      </v-row>
      <v-row justify="center">
        <v-col cols="12" md="10" xl="8"> </v-col>
      </v-row>
    </v-container>
  </section>
</template>

<script>
import SwiperCore, { Navigation } from "swiper";
import { Swiper, SwiperSlide } from "swiper/vue";
SwiperCore.use([Navigation]);
export default {
  name: "packages-component",
  components: {
    Swiper,
    SwiperSlide,
  },
  computed: {
    packagesPerPage() {
      let result = 1;
      if (this.$vuetify.display.smAndUp) result = 2;
      if (this.$vuetify.display.lgAndUp) result = 3;
      return result;
    },
  },
  data() {
    return {
      packages: [
        {
          class: 1,
          name: this.$t("packages.simple"),
          price: this.$t("packages.price", { price: 850 }),
          includes: [
            this.$t("packages.includes.pageCount", { pages: 1 }),
            this.$t("packages.includes.contactForm"),
            this.$t("packages.includes.revisionDesign", { no: 1 }),
            this.$t("packages.includes.responsive"),
            this.$t("packages.includes.seo"),
            this.$t("packages.includes.host"),
            this.$t("packages.includes.secure"),
            this.$t("packages.includes.satisfaction"),
          ],
        },
        {
          class: 2,
          name: this.$t("packages.small"),
          price: this.$t("packages.price", { price: 1150 }),
          includes: [
            this.$t("packages.includes.pageCount", { pages: 3 }),
            this.$t("packages.includes.contactForm"),
            this.$t("packages.includes.revisionDesign", { no: 2 }),
            this.$t("packages.includes.responsive"),
            this.$t("packages.includes.optimize"),
            this.$t("packages.includes.seo"),
            this.$t("packages.includes.host"),
            this.$t("packages.includes.secure"),
            this.$t("packages.includes.sitemap"),
            this.$t("packages.includes.satisfaction"),
          ],
        },
        {
          class: 3,
          name: this.$t("packages.medium"),
          price: this.$t("packages.price", { price: 1950 }),
          includes: [
            this.$t("packages.includes.pageCount", { pages: 5 }),
            this.$t("packages.includes.contactForm"),
            this.$t("packages.includes.revisionDesign", { no: 3 }),
            this.$t("packages.includes.responsive"),
            this.$t("packages.includes.optimize"),
            this.$t("packages.includes.seo"),
            this.$t("packages.includes.host"),
            this.$t("packages.includes.secure"),
            this.$t("packages.includes.manage"),
            this.$t("packages.includes.satisfaction"),
          ],
        },
      ],
    };
  },
  methods: {
    onSwiper() {},
    onSlideChange() {},
  },
};
</script>
