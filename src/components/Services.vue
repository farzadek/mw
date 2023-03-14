<template>
  <section class="section services-container">
    <v-container>
      <v-row class="py-5 py-md-8">
        <v-col cols="12">
          <h3 class="section-subtitle mb-3">{{ $t("services.subTitle") }}</h3>
          <h2 class="section-title mb-6">{{ $t("services.title") }}</h2>
        </v-col>
      </v-row>
      <v-row>
        <v-col
          cols="12"
          sm="6"
          lg="3"
          class="service text-center"
          v-for="service in services"
          :key="service.title"
        >
          <div class="service-box">
            <div class="img-box">
              <v-img :src="service.image">
                <template v-slot:placeholder>
                  <div class="d-flex align-center justify-center fill-height">
                    <v-progress-circular
                      color="grey-lighten-1"
                      indeterminate
                    ></v-progress-circular>
                  </div> </template
              ></v-img>
            </div>
            <h4 class="paragraph-title">
              {{ $t(`services.${service.title}`) }}
            </h4>
            <p class="description">
              {{ $t(`services.${service.description}`) }}
            </p>
          </div>
        </v-col>
      </v-row>
    </v-container>
  </section>
</template>

<script>
import services1 from "@/assets/images/services1.jpg";
import services2 from "@/assets/images/services2.jpg";
import services3 from "@/assets/images/services3.jpg";
import services4 from "@/assets/images/services4.jpg";
export default {
  name: "services-component",
  data() {
    return {
      services: [
        {
          title: "ui",
          description: "uiDescription",
          image: services1,
        },
        {
          title: "programming",
          description: "programmingDescription",
          image: services2,
        },
        {
          title: "ux",
          description: "uxDescription",
          image: services3,
        },
        {
          title: "graphic",
          description: "graphicDescription",
          image: services4,
        },
      ],
    };
  },
};
</script>
