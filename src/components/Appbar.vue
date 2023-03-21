<template>
  <v-app-bar>
    <v-container>
      <v-row>
        <div class="logo-title-box">
          <img
            class="logo-image d-md-none ml-3"
            :src="logo"
            alt="montreal web logo"
          />
          <span class="logo-title d-none d-md-block">MontrealWEB</span>
        </div>
        <v-spacer></v-spacer>
        <v-app-bar-nav-icon
          @click="drawer = !drawer"
          class="d-flex d-md-none mr-5"
          icon="mdi-menu"
        ></v-app-bar-nav-icon>
        <div class="d-none d-md-flex">
          <v-btn>{{ $t("appbar.about") }}</v-btn>
          <v-btn>{{ $t("appbar.services") }}</v-btn>
          <v-menu>
            <template v-slot:activator="{ props }">
              <v-btn v-bind="props"
                >{{ $t("appbar.portfolio")
                }}<v-icon>mdi mdi-menu-down</v-icon></v-btn
              >
            </template>
            <v-list>
              <v-list-item>
                <v-btn variant="plain" block href="/portfolio/graphic">{{
                  $t("appbar.portfolioGr")
                }}</v-btn>
              </v-list-item>
              <v-list-item>
                <v-btn variant="plain" block href="/portfolio/ui">{{
                  $t("appbar.portfolioUi")
                }}</v-btn>
              </v-list-item>
            </v-list>
          </v-menu>
          <v-btn>{{ $t("appbar.packages") }}</v-btn>
          <v-btn>{{ $t("appbar.contact") }}</v-btn>
        </div>
      </v-row>
    </v-container>
  </v-app-bar>
  <v-navigation-drawer v-model="drawer" absolute temporary>
    <v-list nav dense>
      <v-list-item>
        <v-btn variant="plain" block>{{ $t("appbar.about") }}</v-btn>
      </v-list-item>

      <v-btn variant="plain" block>{{ $t("appbar.services") }}</v-btn>
      <v-btn variant="plain" block>{{ $t("appbar.packages") }}</v-btn>
      <v-btn variant="plain" block>{{ $t("appbar.contact") }}</v-btn>
      <v-divider></v-divider>
      <v-list-item>
        <router-link to="/portfolio/graphic">{{
          $t("appbar.portfolioGr")
        }}</router-link>
      </v-list-item>
      <v-list-item>
        <router-link to="/portfolio/ui">{{
          $t("appbar.portfolioUi")
        }}</router-link>
      </v-list-item>
    </v-list>
    <v-btn
      class="ml-3 mt-4"
      variant="text"
      @click="$root.$i18n.locale = $t('appbar.lang')"
      >{{ $t("appbar.lang") }}
    </v-btn>
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
    };
  },
};
</script>
