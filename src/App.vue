<template>
  <v-app>
    <AppbarComponent></AppbarComponent>
    <router-view />
    <Footer-Component></Footer-Component>
  </v-app>
</template>
<script>
import AppbarComponent from "./components/Appbar.vue";
import FooterComponent from "./components/Footer.vue";
export default {
  components: { FooterComponent, AppbarComponent },
  data() {
    return {
      drawer: false,
      tab: null,
      items: ["About", "shopping", "videos", "images", "Contact"],
    };
  },
};
</script>

<style lang="scss">
@import "@/assets/styles/app";
</style>
