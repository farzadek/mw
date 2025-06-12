<template>
  <section class="section uxFolio-container">
    <v-overlay :model-value="showProgress" class="align-center justify-center">
      <v-progress-circular
        color="#5a0060"
        indeterminate
        :size="100"
        :width="10"
      ></v-progress-circular>
    </v-overlay>
    <v-container>
      <v-row>
        <v-col cols="12">
          <h3 class="section-subtitle mb-1">{{ $t("portfolio.title") }}</h3>
          <h2 class="section-title mb-6">
            {{ $t("portfolio.uxSectionTitle") }}
          </h2>
        </v-col>
      </v-row>
      <v-row class="py-3 py-lg-5">
        <v-col cols="12" sm="4" md="3">
          <v-btn
            elevation="3"
            rounded="md"
            class="w-100 pa-3 h-auto"
            :disabled="selectedUxProject === 1"
            @click="selectedUxProject = 1"
          >
            <div class="d-flex flex-column align-center">
              <h3>
                {{
                  $t(
                    `portfolio.uxSections.project${this.selectedUxProject}.projectName`
                  )
                }}
              </h3>
              <v-lazy-image
                class="mt-3 w-100"
                :src="portfolioFiles.coachmoi.title"
              />
            </div>
          </v-btn>
        </v-col>
        <v-col cols="12" sm="8" md="9">
          <h3 class="section-title">
            {{
              $t(
                `portfolio.uxSections.project${this.selectedUxProject}.projectName`
              )
            }}
          </h3>
          <h3 class="primary-color text-h4 mb-3">
            {{
              $t(
                `portfolio.uxSections.project${this.selectedUxProject}.summary`
              )
            }}
          </h3>
          <div class="d-flex align-center">
            <v-icon size="small" class="primary-color mr-1"
              >mdi-star-three-points-outline</v-icon
            >
            <span class="primary-color text-h5 mb-1">
              {{
                $t(
                  `portfolio.uxSections.project${this.selectedUxProject}.mission`
                )
              }}
            </span>
          </div>
          <p class="text-h6 mb-8 ml-5">
            {{
              $t(
                `portfolio.uxSections.project${this.selectedUxProject}.missionText`
              )
            }}
          </p>
          <div class="d-flex align-center">
            <v-icon size="small" class="primary-color mr-1"
              >mdi-star-three-points-outline</v-icon
            >
            <span class="primary-color text-h5 mb-1">
              {{
                $t(
                  `portfolio.uxSections.project${this.selectedUxProject}.myContributions`
                )
              }}
            </span>
          </div>
          <p class="text-h6 mb-10 ml-5 white-space-preline">
            {{
              $t(
                `portfolio.uxSections.project${this.selectedUxProject}.myContributionsText`
              )
            }}
          </p>
          <h3 class="primary-color text-h4 mb-3">
            {{
              $t(
                `portfolio.uxSections.project${this.selectedUxProject}.process`
              )
            }}
          </h3>
          <div class="d-flex align-center">
            <v-icon class="primary-color mr-1"
              >mdi-numeric-1-circle-outline</v-icon
            >
            <span class="primary-color text-h5 mb-1">
              {{
                $t(
                  `portfolio.uxSections.project${this.selectedUxProject}.step1title`
                )
              }}
            </span>
          </div>
          <p class="text-h6 mb-5 ml-5">
            {{
              $t(
                `portfolio.uxSections.project${this.selectedUxProject}.step1Text`
              )
            }}
          </p>
          <v-card
            v-if="portfolioFiles.coachmoi.img1 || portfolioFiles.coachmoi.vid1"
            rounded="lg"
            class="d-flex pa-2 mb-8"
          >
            <v-row>
              <v-col cols="12" md="8">
                <v-lazy-image
                  v-if="portfolioFiles.coachmoi.img1"
                  class="mt-2 border-2 mr-2 w-100"
                  :src="portfolioFiles.coachmoi.img1"
                />
              </v-col>
              <v-col cols="12" md="4">
                <iframe
                  v-if="portfolioFiles.coachmoi.vid1"
                  class="w-100"
                  :src="portfolioFiles.coachmoi.vid1"
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
            <v-icon class="primary-color mr-1"
              >mdi-numeric-2-circle-outline</v-icon
            >
            <span class="primary-color text-h5 mb-1">
              {{
                $t(
                  `portfolio.uxSections.project${this.selectedUxProject}.step2title`
                )
              }}
            </span>
          </div>
          <p class="text-h6 mb-5 ml-8">
            {{
              $t(
                `portfolio.uxSections.project${this.selectedUxProject}.step2Text`
              )
            }}
          </p>
          <v-card
            v-if="portfolioFiles.coachmoi.img2 || portfolioFiles.coachmoi.vid2"
            rounded="lg"
            class="d-flex pa-2 mb-8"
          >
            <v-row>
              <v-col cols="12" md="8">
                <v-lazy-image
                  v-if="portfolioFiles.coachmoi.img2"
                  class="mt-2 border-2 mr-2 w-100"
                  :src="portfolioFiles.coachmoi.img2"
                />
              </v-col>
              <v-col cols="12" md="4">
                <iframe
                  v-if="portfolioFiles.coachmoi.vid2"
                  class="w-100"
                  :src="portfolioFiles.coachmoi.vid2"
                  title="YouTube video player"
                  frameborder="0"
                  allow="accelerometer; allowfullscreen;clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  referrerpolicy="strict-origin-when-cross-origin"
                ></iframe>
              </v-col>
            </v-row>
          </v-card>

          <div class="d-flex align-center">
            <v-icon class="primary-color mr-1"
              >mdi-numeric-3-circle-outline</v-icon
            >
            <span class="primary-color text-h5 mb-1">
              {{
                $t(
                  `portfolio.uxSections.project${this.selectedUxProject}.step3title`
                )
              }}
            </span>
          </div>
          <p class="text-h6 mb-5 ml-5">
            {{
              $t(
                `portfolio.uxSections.project${this.selectedUxProject}.step3Text`
              )
            }}
          </p>
          <v-card
            v-if="portfolioFiles.coachmoi.img3 || portfolioFiles.coachmoi.vid3"
            rounded="lg"
            class="d-flex pa-2 mb-8"
          >
            <v-row>
              <v-col cols="12" md="8">
                <v-lazy-image
                  v-if="portfolioFiles.coachmoi.img3"
                  class="mt-2 border-2 mr-2 w-100"
                  :src="portfolioFiles.coachmoi.img3"
                />
              </v-col>
              <v-col cols="12" md="4">
                <iframe
                  v-if="portfolioFiles.coachmoi.vid3"
                  class="w-100"
                  :src="portfolioFiles.coachmoi.vid3"
                  title="YouTube video player"
                  frameborder="0"
                  allow="accelerometer; allowfullscreen;clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  referrerpolicy="strict-origin-when-cross-origin"
                ></iframe>
              </v-col>
            </v-row>
          </v-card>

          <div class="d-flex align-center">
            <v-icon class="primary-color mr-1"
              >mdi-numeric-4-circle-outline</v-icon
            >
            <span class="primary-color text-h5 mb-1">
              {{
                $t(
                  `portfolio.uxSections.project${this.selectedUxProject}.step4title`
                )
              }}
            </span>
          </div>
          <p class="text-h6 mb-5 ml-5">
            {{
              $t(
                `portfolio.uxSections.project${this.selectedUxProject}.step4Text`
              )
            }}
          </p>
          <v-card
            v-if="portfolioFiles.coachmoi.img4 || portfolioFiles.coachmoi.vid4"
            rounded="lg"
            class="d-flex pa-2 mb-8"
          >
            <v-row>
              <v-col cols="12" md="8">
                <v-lazy-image
                  v-if="portfolioFiles.coachmoi.img4"
                  class="mt-2 border-2 mr-2 w-100"
                  :src="portfolioFiles.coachmoi.img4"
                />
              </v-col>
              <v-col cols="12" md="4">
                <iframe
                  v-if="portfolioFiles.coachmoi.vid4"
                  class="w-100"
                  :src="portfolioFiles.coachmoi.vid4"
                  title="YouTube video player"
                  frameborder="0"
                  allow="accelerometer; allowfullscreen;clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  referrerpolicy="strict-origin-when-cross-origin"
                ></iframe>
              </v-col>
            </v-row>
          </v-card>

          <div class="d-flex align-center">
            <v-icon class="primary-color mr-1"
              >mdi-numeric-5-circle-outline</v-icon
            >
            <span class="primary-color text-h5 mb-1">
              {{
                $t(
                  `portfolio.uxSections.project${this.selectedUxProject}.step5title`
                )
              }}
            </span>
          </div>
          <p class="text-h6 mb-5 ml-5">
            {{
              $t(
                `portfolio.uxSections.project${this.selectedUxProject}.step5Text`
              )
            }}
          </p>
          <v-card
            v-if="portfolioFiles.coachmoi.img5 || portfolioFiles.coachmoi.vid5"
            rounded="lg"
            class="d-flex pa-2 mb-8"
          >
            <v-row>
              <v-col cols="12" md="8">
                <v-lazy-image
                  v-if="portfolioFiles.coachmoi.img5"
                  class="mt-2 border-2 mr-2 w-100"
                  :src="portfolioFiles.coachmoi.img5"
                />
              </v-col>
              <v-col cols="12" md="4">
                <iframe
                  v-if="portfolioFiles.coachmoi.vid5"
                  class="w-100"
                  :src="portfolioFiles.coachmoi.vid5"
                  title="YouTube video player"
                  frameborder="0"
                  allow="accelerometer; allowfullscreen;clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  referrerpolicy="strict-origin-when-cross-origin"
                ></iframe>
              </v-col>
            </v-row>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </section>
</template>

<script>
import VLazyImage from "v-lazy-image";
import { mapGetters } from "vuex";
export default {
  name: "portfolio-ux",
  components: {
    VLazyImage,
  },
  computed: {
    ...mapGetters("common", ["baseUrl"]),
  },
  data() {
    return {
      showProgress: false,
      portfolioFiles: {
        coachmoi: { title: "" },
      },
      selectedUxProject: 1,
    };
  },
  mounted() {
    this.setPortfolio();
  },
  methods: {
    setPortfolio() {
      this.portfolioFiles.coachmoi.title = `${this.$store.getters["common/baseUrl"]}/portfolio/ux/${this.selectedUxProject}/title.jpg`;
      this.portfolioFiles.coachmoi.img1 = `${this.$store.getters["common/baseUrl"]}/portfolio/ux/${this.selectedUxProject}/img1.jpg`;
      this.portfolioFiles.coachmoi.img2 = undefined;
      this.portfolioFiles.coachmoi.img3 = `${this.$store.getters["common/baseUrl"]}/portfolio/ux/${this.selectedUxProject}/img3.jpg`;
      this.portfolioFiles.coachmoi.img4 = undefined;
      this.portfolioFiles.coachmoi.img5 = `${this.$store.getters["common/baseUrl"]}/portfolio/ux/${this.selectedUxProject}/img4.jpg`;
      this.portfolioFiles.coachmoi.vid1 =
        "https://www.youtube.com/embed/-A7VBQCvnwo?si=VZU8xjwgRlGXt_pR";
      this.portfolioFiles.coachmoi.vid2 =
        "https://www.youtube.com/embed/V6BIKx0QH4w?si=I_wG6vxeIO-2Ty4O";
      this.portfolioFiles.coachmoi.vid3 =
        "https://www.youtube.com/embed/PwxYGDxJHSI?si=x-2NXDnRH4LVGTZ2";
      this.portfolioFiles.coachmoi.vid4 = undefined;
      this.portfolioFiles.coachmoi.vid5 =
        "https://www.youtube.com/embed/udSpfgVE6Vw?si=gGgAjTvGSDO0SnUQ";
      this.portfolioFiles.coachmoi.vid6 = undefined;
    },
  },
};
</script>
