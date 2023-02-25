<template>
  <v-container class="contact-container">
    <v-row class="py-5 py-md-8">
      <v-col cols="12">
        <h3 class="text-h5 mb-3">NEED TO TALK TO ME?</h3>
        <h2 class="text-h2 mb-6">CONTACT</h2>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "Contact-component",
};
</script>
<style lang="scss">
.contact-container {
  width: 100vw;
  .text-h5 {
    text-transform: uppercase;
    text-align: center;
    color: #666666;
    font-family: "Raleway", Helvetica, Arial, sans-serif !important;
  }
  h2 {
    text-transform: uppercase;
    text-align: center;
    color: #5a0060;
    font-family: "Raleway", Helvetica, Arial, sans-serif !important;
    font-weight: bold;
  }
}
</style>
