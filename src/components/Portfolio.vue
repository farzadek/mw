<template>
  <v-container class="portfolio-container">
    <v-row class="py-5 py-md-8">
      <v-col cols="12">
        <h3 class="section-subtitle mb-3">SEE SOME OF PROJECTS AND DESIGNS</h3>
        <h2 class="section-title mb-6">PORTFOLIO</h2>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "portfolio-component",
};
</script>
<style lang="scss">
.portfolio-container {
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
}
</style>
