<template>
  <section class="section uxFolio-container">
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
        <v-col cols="12" sm="4" md="3" class="projects">
          <v-btn
            elevation="3"
            rounded="md"
            :class="[
              'w-100 pa-3 h-auto mb-4',
              { selected: selectedUxProject === 1 },
            ]"
            @click="selectedUxProject = 1"
          >
            <div class="d-flex flex-column align-center">
              <h3>Coach.moi</h3>
              <v-lazy-image class="mt-3 w-100" :src="titles[0]" />
            </div>
          </v-btn>
          <v-btn
            elevation="3"
            rounded="md"
            :class="[
              'w-100 pa-3 h-auto',
              { selected: selectedUxProject === 2 },
            ]"
            @click="selectedUxProject = 2"
          >
            <div class="d-flex flex-column align-center">
              <h3>AlloFriends</h3>
              <v-lazy-image class="mt-3 w-100" :src="titles[1]" />
            </div>
          </v-btn>
        </v-col>
        <CoachmoiComponent v-if="selectedUxProject === 1" />
        <AllofriendsComponent v-if="selectedUxProject === 2" />
      </v-row>
    </v-container>
  </section>
</template>

<script>
import VLazyImage from "v-lazy-image";
import { mapGetters } from "vuex";
import CoachmoiComponent from "@/components/ux/Coachmoi.vue";
import AllofriendsComponent from "@/components/ux/Allofriends.vue";

import title1 from "@/assets/images/ux/title1.jpg";
import title2 from "@/assets/images/ux/title2.jpg";
export default {
  name: "portfolio-ux",
  components: {
    VLazyImage,
    CoachmoiComponent,
    AllofriendsComponent,
  },
  computed: {
    ...mapGetters("common", ["baseUrl"]),
  },
  data() {
    return {
      titles: [title1, title2],
      selectedUxProject: 1,
    };
  },
};
</script>
