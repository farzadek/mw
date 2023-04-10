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
          <v-btn @click="scrollToAnchorPoint('aboutSection')">{{
            $t("appbar.about")
          }}</v-btn>
          <v-btn @click="scrollToAnchorPoint('servicesSection')">{{
            $t("appbar.services")
          }}</v-btn>
          <v-menu>
            <template v-slot:activator="{ props }">
              <v-btn
                v-bind="props"
                @click="scrollToAnchorPoint('portfolioSection')"
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
          <v-btn @click="scrollToAnchorPoint('packagesSection')">{{
            $t("appbar.packages")
          }}</v-btn>
          <v-btn @click="scrollToAnchorPoint('contactSection')">{{
            $t("appbar.contact")
          }}</v-btn>
        </div>
      </v-row>
    </v-container>
  </v-app-bar>
  <v-navigation-drawer v-model="drawer" absolute temporary>
    <v-list nav dense>
      <v-list-item>
        <v-btn
          variant="plain"
          block
          @click="scrollToAnchorPoint('aboutSection')"
          >{{ $t("appbar.about") }}</v-btn
        >
      </v-list-item>

      <v-btn
        variant="plain"
        block
        @click="scrollToAnchorPoint('servicesSection')"
        >{{ $t("appbar.services") }}</v-btn
      >
      <v-btn
        variant="plain"
        block
        @click="scrollToAnchorPoint('packagesSection')"
        >{{ $t("appbar.packages") }}</v-btn
      >
      <v-expansion-panels>
        <v-expansion-panel :title="$t('appbar.portfolio')" elevation="0">
          <v-expansion-panel-text>
            <v-btn block variant="plain">
              <router-link to="/portfolio/graphic">{{
                $t("appbar.portfolioGr")
              }}</router-link>
            </v-btn>
            <v-btn block variant="plain">
              <router-link to="/portfolio/ui">{{
                $t("appbar.portfolioUi")
              }}</router-link>
            </v-btn>
            <v-divider></v-divider>
          </v-expansion-panel-text>
        </v-expansion-panel>
      </v-expansion-panels>
      <v-btn
        @click="scrollToAnchorPoint('contactSection')"
        variant="plain"
        block
        >{{ $t("appbar.contact") }}</v-btn
      >
    </v-list>
    <v-btn
      class="mt-4"
      variant="plain"
      block
      @click="
        $root.$i18n.locale = $t('appbar.lang');
        drawer = false;
      "
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
  methods: {
    scrollToAnchorPoint(refName) {
      const el = document.getElementById(refName);
      el.scrollIntoView({ behavior: "smooth" });
      this.drawer = false;
    },
  },
};
</script>
