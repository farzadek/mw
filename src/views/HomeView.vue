<template>
  <Hero-Component />
  <AboutComponent />
  <ServicesComponent />
  <PortfolioComponent />
  <PackagesComponent />
  <ContactComponent />
</template>

<script>
import HeroComponent from "@/components/Hero.vue";
import AboutComponent from "@/components/About.vue";
import ServicesComponent from "@/components/Services.vue";
import PortfolioComponent from "@/components/Portfolio.vue";
import PackagesComponent from "@/components/Packages.vue";
import ContactComponent from "@/components/Contact.vue";
export default {
  name: "HomeView",
  components: {
    HeroComponent,
    AboutComponent,
    ServicesComponent,
    PortfolioComponent,
    PackagesComponent,
    ContactComponent,
  },
};
</script>
