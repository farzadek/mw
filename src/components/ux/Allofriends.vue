<template>
  <v-col cols="12" sm="8" md="9">
    <h3 class="section-title">
      {{ $t("portfolio.uxSections.project2.projectName") }}
    </h3>
    <h3 class="primary-color text-h4 mb-3">
      {{ $t(`portfolio.uxSections.project2.summary`) }}
    </h3>
    <div class="d-flex align-center">
      <v-icon size="small" class="primary-color mr-1"
        >mdi-star-three-points-outline</v-icon
      >
      <span class="primary-color text-h5 mb-1">
        {{ $t(`portfolio.uxSections.project2.mission`) }}
      </span>
    </div>
    <p class="text-h6 mb-8 ml-5">
      {{ $t(`portfolio.uxSections.project2.missionText`) }}
    </p>
    <div class="d-flex align-center">
      <v-icon size="small" class="primary-color mr-1"
        >mdi-star-three-points-outline</v-icon
      >
      <span class="primary-color text-h5 mb-1">
        {{ $t(`portfolio.uxSections.project2.myContributions`) }}
      </span>
    </div>
    <p class="text-h6 mb-10 ml-5 white-space-preline">
      {{ $t(`portfolio.uxSections.project2.myContributionsText`) }}
    </p>
    <h3 class="primary-color text-h4 mb-3">
      {{ $t(`portfolio.uxSections.project2.process`) }}
    </h3>
    <div class="d-flex align-center">
      <v-icon class="primary-color mr-1">mdi-numeric-1-circle-outline</v-icon>
      <span class="primary-color text-h5 mb-1">
        {{ $t(`portfolio.uxSections.project2.step1title`) }}
      </span>
    </div>
    <p class="text-h6 mb-5 ml-5">
      {{ $t(`portfolio.uxSections.project2.step1Text`) }}
    </p>
    <v-card rounded="lg" class="d-flex pa-2 mb-8">
      <v-row>
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
        {{ $t(`portfolio.uxSections.project2.step2title`) }}
      </span>
    </div>
    <p class="text-h6 mb-5 ml-5">
      {{ $t(`portfolio.uxSections.project2.step2Text`) }}
    </p>
    <v-card rounded="lg" class="d-flex pa-2 mb-8">
      <v-row>
        <v-col cols="12" md="4">
          <iframe
            class="w-100"
            :src="portfolioFiles.vid2"
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
      <v-icon class="primary-color mr-1">mdi-numeric-3-circle-outline</v-icon>
      <span class="primary-color text-h5 mb-1">
        {{ $t(`portfolio.uxSections.project2.step3title`) }}
      </span>
    </div>
    <p class="text-h6 mb-5 ml-5">
      {{ $t(`portfolio.uxSections.project2.step3Text`) }}
    </p>
    <v-card rounded="lg" class="d-flex pa-2 mb-8">
      <v-row>
        <v-col cols="12">
          <v-lazy-image
            class="mt-2 border-2 mr-2 w-100"
            :src="portfolioFiles.img3"
          />
        </v-col>
      </v-row>
    </v-card>

    <div class="d-flex align-center">
      <v-icon class="primary-color mr-1">mdi-numeric-4-circle-outline</v-icon>
      <span class="primary-color text-h5 mb-1">
        {{ $t(`portfolio.uxSections.project2.step4title`) }}
      </span>
    </div>
    <p class="text-h6 mb-5 ml-5">
      {{ $t(`portfolio.uxSections.project2.step4Text`) }}
    </p>
    <v-card rounded="lg" class="d-flex pa-2 mb-8">
      <v-row>
        <v-col cols="12" md="8">
          <v-lazy-image
            class="mt-2 border-2 mr-2 w-100"
            :src="portfolioFiles.img4"
          />
        </v-col>
        <v-col cols="12" md="4">
          <iframe
            class="w-100"
            :src="portfolioFiles.vid3"
            title="YouTube video player"
            frameborder="0"
            allowfullscreen
            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
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
  name: "allofriends-component",
  components: {
    VLazyImage,
  },
  data() {
    return {
      showProgress: false,
      portfolioFiles: {
        vid1: "https://www.youtube.com/embed/RDRiEIW8_rU?si=IgdmhNkTVUM-EmpI",
        vid2: "https://www.youtube.com/embed/T6Kxk-4E9FM?si=dZ92jxlGJ133lEKE",
        img3: `${this.$store.getters["common/baseUrl"]}/portfolio/ux/2/img1.jpg`,
        vid3: "https://www.youtube.com/embed/YL4N6_UJpYI?si=-wwGtU-QagscuIEv",
        img4: `${this.$store.getters["common/baseUrl"]}/portfolio/ux/2/img2.jpg`,
      },
    };
  },
};
</script>
