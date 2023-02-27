<template>
  <v-footer class="d-block bg-grey-darken-4 py-3 w-100">
    <div class="d-flex w-100 align-center justify-center px-4">
      <v-btn
        v-for="item in footerItems"
        :key="item"
        class="mx-4"
        variant="plain"
        size="small"
        >{{ $t(`appbar.${item}`) }}
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
      footerItems: ["about", "services", "portfolio", "packages", "contact"],
    };
  },
};
</script>

<style lang="scss">
.v-footer {
  flex: unset !important;
}
</style>
