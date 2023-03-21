<template>
  <section class="section uiFolio-container">
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
            {{ $t("portfolio.uiSectionTitle") }}
          </h2>
        </v-col>
      </v-row>
      <v-row class="py-5">
        <v-col cols="12">
          <div class="sections-box">
            <v-checkbox
              v-for="sec in uiSections"
              :key="sec.name"
              :class="sec.selected ? 'selected' : ''"
              v-model="sec.selected"
              :label="sec.name"
              color="white"
              density="compact"
              hide-details
            ></v-checkbox>
          </div>
        </v-col>
      </v-row>
      <v-row class="mb-8">
        <v-col cols="12" class="portfolio-box">
          <div class="col-box">
            <v-card
              v-for="fileName in portfolioToViewFiles[0]"
              :key="fileName"
              @click="viewFile(fileName)"
            >
              <v-lazy-image
                :src="`http://localhost:8888/mw-vue/portfolio/ui/${fileName.url}`"
              />
            </v-card>
          </div>
          <div class="col-box">
            <v-card
              v-for="fileName in portfolioToViewFiles[1]"
              :key="fileName"
              @click="viewFile(fileName)"
            >
              <v-lazy-image
                :src="`http://localhost:8888/mw-vue/portfolio/ui/${fileName.url}`"
              />
            </v-card>
          </div>
          <div class="col-box">
            <v-card
              v-for="fileName in portfolioToViewFiles[2]"
              :key="fileName"
              @click="viewFile(fileName)"
            >
              <v-lazy-image
                :src="`http://localhost:8888/mw-vue/portfolio/ui/${fileName.url}`"
              />
            </v-card>
          </div>
          <div class="col-box">
            <v-card
              v-for="fileName in portfolioToViewFiles[3]"
              :key="fileName"
              @click="viewFile(fileName)"
            >
              <v-lazy-image
                :src="`http://localhost:8888/mw-vue/portfolio/ui/${fileName.url}`"
              />
            </v-card>
          </div>
        </v-col>
      </v-row>
    </v-container>

    <v-dialog class="previwUiDialog" v-model="showDialog" fullscreen scrollable>
      <v-card @click="showDialog = false">
        <!-- <v-btn @click="showDialog = false"><v-icon>mdi-close</v-icon></v-btn> -->
        <img
          :width="fullViwFile.width"
          :height="fullViwFile.height"
          :src="`http://localhost:8888/mw-vue/portfolio/ui/${fullViwFile.url}`"
        />
      </v-card>
    </v-dialog>
  </section>
</template>

<script>
import VLazyImage from "v-lazy-image";
import { mapGetters } from "vuex";
export default {
  name: "portfolio-ui",
  components: {
    VLazyImage,
  },
  computed: {
    ...mapGetters("portfolio", ["portfoliosList, uiSections"]),
    portfolioToViewFiles() {
      const selected = this.uiSections.filter((el) => el.selected);
      return this.fillColumns(selected);
    },
  },
  data() {
    return {
      showProgress: false,
      showDialog: false,
      fullViwFile: null,
      portfolioFiles: [],
      uiSections: [],
    };
  },
  async mounted() {
    this.showProgress = true;
    try {
      await this.$store.dispatch("portfolio/loadPortfolio", "ui");
    } catch (err) {
      console.log(err);
    }

    try {
      this.portfolioFiles = await this.$store.getters[
        "portfolio/portfoliosList"
      ]("ui");
      const secs = this.$store.getters["portfolio/uiSections"];
      secs.forEach((el) => {
        this.uiSections.push({
          name: this.$t(`portfolio.uiSections.${el}`),
          slug: el,
          selected: false,
        });
      });
      this.uiSections[
        Math.floor(Math.random() * this.uiSections.length)
      ].selected = true;
    } catch {
      (err) => console.log(err);
    } finally {
      this.showProgress = false;
    }
  },
  methods: {
    fillColumns(section) {
      const list1 = { values: [], total: 0 };
      const list2 = { values: [], total: 0 };
      const list3 = { values: [], total: 0 };
      const list4 = { values: [], total: 0 };

      let selectedFiles = [];
      section.forEach((cat) => {
        const res = this.portfolioFiles.filter((el) => {
          return el.url.slice(0, -6) === cat.slug;
        });
        selectedFiles = selectedFiles.concat(res);
      });
      selectedFiles.forEach((el) => {
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

      return [list1.values, list2.values, list3.values, list4.values];
    },
    viewFile(filename) {
      this.showDialog = true;
      this.fullViwFile = filename;
    },
  },
};
</script>
