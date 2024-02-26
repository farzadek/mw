<template>
  <section class="section contact-container" id="contactSection">
    <v-container>
      <v-row class="py-5 py-md-8">
        <v-col cols="12">
          <h3 class="section-subtitle mb-3">{{ $t("contact.subTitle") }}</h3>
          <h2 class="section-title">{{ $t("contact.title") }}</h2>
        </v-col>
      </v-row>
      <v-row justify="center">
        <v-col cols="12" sm="10" md="8" lg="6">
          <v-card>
            <v-tabs v-model="formTab" slider-color="#5a0060">
              <v-tab append-icon="mdi-form-select" value="one">{{
                $t("contact.tabs.tab1")
              }}</v-tab>
              <v-tab append-icon="mdi-microphone" value="two">{{
                $t("contact.tabs.tab2")
              }}</v-tab>
            </v-tabs>

            <v-card-text>
              <v-window v-model="formTab">
                <v-window-item value="one">
                  <ContactForm />
                </v-window-item>

                <v-window-item class="recording-audio" value="two">
                  <VoiceForm />
                </v-window-item>
              </v-window>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </section>
</template>

<script>
import ContactForm from "./contact/ContactForm.vue";
import VoiceForm from "./contact/VoiceForm.vue";
export default {
  name: "Contact-component",
  components: {
    ContactForm,
    VoiceForm,
  },
  data() {
    return {
      formTab: null,
    };
  },
};
</script>
