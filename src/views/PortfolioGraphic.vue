<template>
  <section class="section graphicFolio-container">
    <v-overlay :model-value="showProgress" class="align-center justify-center">
      <v-progress-circular
        color="#5a0060"
        indeterminate
        :size="100"
        :width="10"
      ></v-progress-circular>
    </v-overlay>
    <v-container>
      <v-row class="py-5">
        <v-col cols="12">
          <h3 class="section-subtitle mb-1">{{ $t("portfolio.title") }}</h3>
          <h2 class="section-title mb-6">
            {{ $t("portfolio.graphicSectionTitle") }}
          </h2>
        </v-col>
      </v-row>
      <v-row class="mb-8">
        <v-col cols="12" class="portfolio-box">
          <div class="col-box">
            <v-card
              v-for="fileName in portfolioFiles[0]"
              :key="fileName"
              @click="viewFile(fileName)"
            >
              <v-lazy-image
                :src="`${$store.getters['common/baseUrl']}/portfolio/graphic/${fileName.url}`"
              />
            </v-card>
          </div>
          <div class="col-box">
            <v-card
              v-for="fileName in portfolioFiles[1]"
              :key="fileName"
              @click="viewFile(fileName)"
            >
              <v-lazy-image
                :src="`${$store.getters['common/baseUrl']}/portfolio/graphic/${fileName.url}`"
              />
            </v-card>
          </div>
          <div class="col-box">
            <v-card
              v-for="fileName in portfolioFiles[2]"
              :key="fileName"
              @click="viewFile(fileName)"
            >
              <v-lazy-image
                :src="`${$store.getters['common/baseUrl']}/portfolio/graphic/${fileName.url}`"
              />
            </v-card>
          </div>
          <div class="col-box">
            <v-card
              v-for="fileName in portfolioFiles[3]"
              :key="fileName"
              @click="viewFile(fileName)"
            >
              <v-lazy-image
                :src="`${$store.getters['common/baseUrl']}/portfolio/graphic/${fileName.url}`"
              />
            </v-card>
          </div>
        </v-col>
      </v-row>
    </v-container>

    <v-dialog class="previwDesignDialog" v-model="showDialog" fullscreen>
      <v-card>
        <v-btn @click="showDialog = false"><v-icon>mdi-close</v-icon></v-btn>
        <img
          :width="fullViwFile.width"
          :height="fullViwFile.height"
          :src="`${$store.getters['common/baseUrl']}/portfolio/graphic/${fullViwFile.url}`"
        />
      </v-card>
    </v-dialog>
  </section>
</template>

<script>
import VLazyImage from "v-lazy-image";
import { mapGetters } from "vuex";
export default {
  name: "portfolio-graphic",
  components: {
    VLazyImage,
  },
  computed: {
    ...mapGetters("portfolio", ["portfoliosList"]),
  },
  data() {
    return {
      showProgress: false,
      showDialog: false,
      fullViwFile: null,
      portfolioFiles: [],
    };
  },
  async mounted() {
    this.showProgress = true;
    try {
      await this.$store.dispatch("portfolio/loadPortfolio", "graphic");
    } catch (err) {
      console.log(err);
    }

    try {
      const files = await this.$store.getters["portfolio/portfoliosList"](
        "graphic"
      );
      this.fillColumns(files);
    } catch {
      (err) => console.log(err);
    } finally {
      this.showProgress = false;
    }
  },
  methods: {
    fillColumns(files) {
      const list1 = { values: [], total: 0 };
      const list2 = { values: [], total: 0 };
      const list3 = { values: [], total: 0 };
      const list4 = { values: [], total: 0 };
      files.forEach((el) => {
        if (list1.total <= list2.total) {
          list1.values.push(el);
          list1.total += el.height;
        } else if (list2.total <= list3.total) {
          list2.values.push(el);
          list2.total += el.height;
        } else if (list3.total <= list4.total) {
          list3.values.push(el);
          list3.total += el.height;
        } else {
          list4.values.push(el);
          list4.total += el.height;
        }
      });
      this.portfolioFiles.push(
        list1.values,
        list2.values,
        list3.values,
        list4.values
      );
    },
    viewFile(filename) {
      this.showDialog = true;
      this.fullViwFile = filename;
    },
  },
};
</script>
