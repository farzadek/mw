<template>
  <v-app-bar>
    <v-container>
      <v-row>
        <div class="logo-title-box">
          <img
            class="logo-image d-md-none"
            :src="logo"
            alt="montreal web logo"
          />
          <span class="logo-title d-none d-md-block">MontrealWEB</span>
        </div>
        <v-spacer></v-spacer>
        <v-app-bar-nav-icon
          @click="drawer = !drawer"
          class="d-flex d-md-none"
          icon="mdi-menu"
        ></v-app-bar-nav-icon>
        <div class="d-none d-md-flex">
          <v-btn v-for="item in appbarItems" :key="item">{{
            $t(`appbar.${item}`)
          }}</v-btn>
        </div>
      </v-row>
    </v-container>
  </v-app-bar>
  <v-navigation-drawer v-model="drawer" absolute temporary>
    <v-list nav dense>
      <v-list-item v-for="item in appbarItems" :key="item">
        <v-btn>{{ $t(`appbar.${item}`) }}</v-btn>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
import Logo from "@/assets/images/logo.png";
export default {
  name: "appbar-component",
  data() {
    return {
      drawer: false,
      logo: Logo,
      appbarItems: [
        "about",
        "services",
        "portfolio",
        "packages",
        "blog",
        "contact",
      ],
    };
  },
};
</script>
<style lang="scss">
@import "@/assets/styles/appbar";
</style>
