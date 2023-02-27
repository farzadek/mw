<template>
  <section class="about-section">
    <v-container>
      <v-row class="py-5 py-md-8 justify-center">
        <v-col cols="12" sm="10" md="9" lg="8">
          <h3 class="section-subtitle mb-3">{{ $t(`about.subTitle`) }}</h3>
          <h1 class="section-title mb-6">{{ $t(`about.title`) }}</h1>
          <p class="description text-center">
            {{ $t(`about.description`) }}
          </p>
        </v-col>
      </v-row>
    </v-container>
  </section>
</template>

<script>
export default {
  name: "about-component",
};
</script>
<style lang="scss">
@import "@/assets/styles/about";
</style>
