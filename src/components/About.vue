<template>
  <v-container class="about-container">
    <v-row class="py-5 py-md-8 justify-center">
      <v-col cols="12" sm="10" md="9" lg="8">
        <h3 class="section-subtitle mb-3">{{ $t(`about.subTitle`) }}</h3>
        <h2 class="section-title mb-6">{{ $t(`about.title`) }}</h2>
        <p class="description text-center mb-10">
          {{ $t(`about.description`) }}
        </p>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import BehanceIcon from "@/assets/images/behance.png";
export default {
  name: "about-component",
  data() {
    return {
      behanceIcon: BehanceIcon,
    };
  },
};
</script>
<style lang="scss">
.about-container {
  width: 100vw;
  .section-subtitle {
    text-transform: uppercase;
    text-align: center;
    color: #666666;
    font-family: "Raleway", Helvetica, Arial, sans-serif !important;
    font-size: 1em;
    font-weight: 700;
  }
  .section-title {
    text-transform: uppercase;
    text-align: center;
    color: #5a0060;
    font-family: Roboto, Helvetica, Arial, sans-serif !important;
    font-weight: 900;
    font-size: 3em;
  }
  .description {
    font-family: Roboto, Helvetica, Arial, sans-serif !important;
    font-size: 1.35em;
    line-height: 1.6;
    color: #181818;
  }
  .links {
    display: flex;
    align-items: center;
    justify-content: center;
  }
}
</style>
