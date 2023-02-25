<template>
  <div class="hero-container">
    <div class="hero-text-box">
      <div class="hero-text">{{ $t(`hero.wedo`) }} <span>WEB DESIGN</span></div>
      <div class="buttons-box">
        <v-btn class="primary-btn mr-5">{{ $t(`hero.portfolio`) }}</v-btn>
        <v-btn>{{ $t(`hero.packages`) }}</v-btn>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "hero-component",
};
</script>
<style lang="scss">
@import "@/assets/styles/hero";
</style>
