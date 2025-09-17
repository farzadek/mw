<template>
  <v-col cols="12" sm="8" md="9">
    <h3 class="section-title">
      {{ $t("portfolio.uxSections.project1.projectName") }}
    </h3>
    <h3 class="primary-color text-h4 mb-3">
      {{ $t(`portfolio.uxSections.project1.summary`) }}
    </h3>
    <div class="d-flex align-center">
      <v-icon size="small" class="primary-color mr-1"
        >mdi-star-three-points-outline</v-icon
      >
      <span class="primary-color text-h5 mb-1">
        {{ $t(`portfolio.uxSections.project1.mission`) }}
      </span>
    </div>
    <p class="text-h6 mb-8 ml-5">
      {{ $t(`portfolio.uxSections.project1.missionText`) }}
    </p>
    <div class="d-flex align-center">
      <v-icon size="small" class="primary-color mr-1"
        >mdi-star-three-points-outline</v-icon
      >
      <span class="primary-color text-h5 mb-1">
        {{ $t(`portfolio.uxSections.project1.myContributions`) }}
      </span>
    </div>
    <p class="text-h6 mb-10 ml-5 white-space-preline">
      {{ $t(`portfolio.uxSections.project1.myContributionsText`) }}
    </p>
    <h3 class="primary-color text-h4 mb-3">
      {{ $t(`portfolio.uxSections.project1.process`) }}
    </h3>
    <div class="d-flex align-center">
      <v-icon class="primary-color mr-1">mdi-numeric-1-circle-outline</v-icon>
      <span class="primary-color text-h5 mb-1">
        {{ $t(`portfolio.uxSections.project1.step1title`) }}
      </span>
    </div>
    <p class="text-h6 mb-5 ml-5">
      {{ $t(`portfolio.uxSections.project1.step1Text`) }}
    </p>
    <v-card
      v-if="portfolioFiles.img1 || portfolioFiles.vid1"
      rounded="lg"
      class="d-flex pa-2 mb-8"
    >
      <v-row>
        <v-col cols="12" md="8">
          <v-lazy-image
            v-if="portfolioFiles.img1"
            class="mt-2 border-2 mr-2 w-100"
            :src="portfolioFiles.img1"
          />
        </v-col>
        <v-col cols="12" md="4">
          <iframe
            v-if="portfolioFiles.vid1"
            class="w-100"
            :src="portfolioFiles.vid1"
            title="YouTube video player"
            frameborder="0"
            allowfullscreen
            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin"
          ></iframe>
        </v-col>
      </v-row>
    </v-card>

    <div class="d-flex align-center">
      <v-icon class="primary-color mr-1">mdi-numeric-2-circle-outline</v-icon>
      <span class="primary-color text-h5 mb-1">
        {{ $t(`portfolio.uxSections.project1.step2title`) }}
      </span>
    </div>
    <p class="text-h6 mb-5 ml-8">
      {{ $t(`portfolio.uxSections.project1.step2Text`) }}
    </p>
    <v-card
      v-if="portfolioFiles.img2 || portfolioFiles.vid2"
      rounded="lg"
      class="d-flex pa-2 mb-8"
    >
      <v-row>
        <v-col cols="12" md="8">
          <v-lazy-image
            v-if="portfolioFiles.img2"
            class="mt-2 border-2 mr-2 w-100"
            :src="portfolioFiles.img2"
          />
        </v-col>
        <v-col cols="12" md="4">
          <iframe
            v-if="portfolioFiles.vid2"
            class="w-100"
            :src="portfolioFiles.vid2"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; allowfullscreen;clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin"
          ></iframe>
        </v-col>
      </v-row>
    </v-card>

    <div class="d-flex align-center">
      <v-icon class="primary-color mr-1">mdi-numeric-3-circle-outline</v-icon>
      <span class="primary-color text-h5 mb-1">
        {{ $t(`portfolio.uxSections.project1.step3title`) }}
      </span>
    </div>
    <p class="text-h6 mb-5 ml-5">
      {{ $t(`portfolio.uxSections.project1.step3Text`) }}
    </p>
    <v-card
      v-if="portfolioFiles.img3 || portfolioFiles.vid3"
      rounded="lg"
      class="d-flex pa-2 mb-8"
    >
      <v-row>
        <v-col cols="12" md="8">
          <v-lazy-image
            v-if="portfolioFiles.img3"
            class="mt-2 border-2 mr-2 w-100"
            :src="portfolioFiles.img3"
          />
        </v-col>
        <v-col cols="12" md="4">
          <iframe
            v-if="portfolioFiles.vid3"
            class="w-100"
            :src="portfolioFiles.vid3"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; allowfullscreen;clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin"
          ></iframe>
        </v-col>
      </v-row>
    </v-card>

    <div class="d-flex align-center">
      <v-icon class="primary-color mr-1">mdi-numeric-4-circle-outline</v-icon>
      <span class="primary-color text-h5 mb-1">
        {{ $t(`portfolio.uxSections.project1.step4title`) }}
      </span>
    </div>
    <p class="text-h6 mb-5 ml-5">
      {{ $t(`portfolio.uxSections.project1.step4Text`) }}
    </p>
    <v-card
      v-if="portfolioFiles.img4 || portfolioFiles.vid4"
      rounded="lg"
      class="d-flex pa-2 mb-8"
    >
      <v-row>
        <v-col cols="12" md="8">
          <v-lazy-image
            v-if="portfolioFiles.img4"
            class="mt-2 border-2 mr-2 w-100"
            :src="portfolioFiles.img4"
          />
        </v-col>
        <v-col cols="12" md="4">
          <iframe
            v-if="portfolioFiles.vid4"
            class="w-100"
            :src="portfolioFiles.vid4"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; allowfullscreen;clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin"
          ></iframe>
        </v-col>
      </v-row>
    </v-card>

    <div class="d-flex align-center">
      <v-icon class="primary-color mr-1">mdi-numeric-5-circle-outline</v-icon>
      <span class="primary-color text-h5 mb-1">
        {{ $t(`portfolio.uxSections.project1.step5title`) }}
      </span>
    </div>
    <p class="text-h6 mb-5 ml-5">
      {{ $t(`portfolio.uxSections.project1.step5Text`) }}
    </p>
    <v-card
      v-if="portfolioFiles.img5 || portfolioFiles.vid5"
      rounded="lg"
      class="d-flex pa-2 mb-8"
    >
      <v-row>
        <v-col cols="12" md="8">
          <v-lazy-image
            v-if="portfolioFiles.img5"
            class="mt-2 border-2 mr-2 w-100"
            :src="portfolioFiles.img5"
          />
        </v-col>
        <v-col cols="12" md="4">
          <iframe
            v-if="portfolioFiles.vid5"
            class="w-100"
            :src="portfolioFiles.vid5"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; allowfullscreen;clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin"
          ></iframe>
        </v-col>
      </v-row>
    </v-card>
  </v-col>
</template>

<script>
import VLazyImage from "v-lazy-image";
export default {
  name: "coachmoi-component",
  components: {
    VLazyImage,
  },
  data() {
    return {
      showProgress: false,
      portfolioFiles: {},
    };
  },
  mounted() {
    this.portfolioFiles.title = `${this.$store.getters["common/baseUrl"]}/portfolio/ux/1/title.jpg`;
    this.portfolioFiles.img1 = `${this.$store.getters["common/baseUrl"]}/portfolio/ux/1/img1.jpg`;
    this.portfolioFiles.img2 = undefined;
    this.portfolioFiles.img3 = `${this.$store.getters["common/baseUrl"]}/portfolio/ux/1/img3.jpg`;
    this.portfolioFiles.img4 = undefined;
    this.portfolioFiles.img5 = `${this.$store.getters["common/baseUrl"]}/portfolio/ux/1/img4.jpg`;
    this.portfolioFiles.vid1 =
      "https://www.youtube.com/embed/-A7VBQCvnwo?si=VZU8xjwgRlGXt_pR";
    this.portfolioFiles.vid2 =
      "https://www.youtube.com/embed/V6BIKx0QH4w?si=I_wG6vxeIO-2Ty4O";
    this.portfolioFiles.vid3 =
      "https://www.youtube.com/embed/PwxYGDxJHSI?si=x-2NXDnRH4LVGTZ2";
    this.portfolioFiles.vid4 = undefined;
    this.portfolioFiles.vid5 =
      "https://www.youtube.com/embed/udSpfgVE6Vw?si=gGgAjTvGSDO0SnUQ";
    this.portfolioFiles.vid6 = undefined;
  },
};
</script>
