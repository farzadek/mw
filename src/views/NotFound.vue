<template>
  <section class="not-found">
    <picture>
      <source media="(min-width:650px)" :srcset="notfoundImg" />
      <v-lazy-image :src="notfoundImgM" />
    </picture>
    <div class="ml-4">
      <p class="text-h2 mb-6">{{ $t(`pageNotFound.title`) }}</p>
      <v-btn size="large" variant="text" color="black" elevation="0" to="/">{{
        $t(`pageNotFound.backToHome`)
      }}</v-btn>
      <v-btn
        size="large"
        color="black"
        variant="text"
        elevation="0"
        to="/graphic"
        >{{ $t(`pageNotFound.graphic`) }}</v-btn
      >
      <v-btn size="large" color="black" variant="text" elevation="0" to="/ui">{{
        $t(`pageNotFound.ui`)
      }}</v-btn>
    </div>
  </section>
</template>

<script>
import VLazyImage from "v-lazy-image";
import notfoundImg from "@/assets/images/four04.jpg";
import notfoundImgM from "@/assets/images/four04m.jpg";
export default {
  name: "NotFound",
  components: {
    VLazyImage,
  },
  data() {
    return {
      notfoundImg: notfoundImg,
      notfoundImgM: notfoundImgM,
    };
  },
};
</script>
