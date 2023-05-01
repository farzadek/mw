<template>
  <v-footer class="d-block bg-grey-darken-4 py-3 w-100">
    <div class="d-flex w-100 align-center justify-center px-4">
      <v-btn
        v-for="item in footerItems"
        :key="item.id"
        class="mx-4"
        variant="plain"
        size="small"
        @click="scrollToAnchorPoint(item.id)"
        >{{ $t(`appbar.${item.name}`) }}
      </v-btn>
      <v-btn
        class="mx-4"
        variant="plain"
        size="small"
        @click="$root.$i18n.locale = $t('appbar.lang')"
        >{{ $t("appbar.lang") }}
      </v-btn>
    </div>
    <div class="pt-4 text-center w-100">
      {{ new Date().getFullYear() }} — MontrealWeb.ca
    </div>
  </v-footer>
</template>
<script>
export default {
  name: "Footer-Component",
  data() {
    return {
      footerItems: [
        { name: "about", id: "aboutSection" },
        { name: "services", id: "servicesSection" },
        { name: "portfolio", id: "portfolioSection" },
        { name: "packages", id: "packagesSection" },
        { name: "contact", id: "contactSection" },
      ],
    };
  },
  methods: {
    async scrollToAnchorPoint(refName) {
      if (this.$route.path !== "/") await this.$router.push({ path: "/" });
      const el = document.getElementById(refName);
      el.scrollIntoView({ behavior: "smooth" });
      this.drawer = false;
    },
  },
};
</script>
