<template>
  <section class="section contact-container">
    <v-container>
      <v-row class="py-5 py-md-8">
        <v-col cols="12">
          <h3 class="section-subtitle mb-3">{{ $t("contact.subTitle") }}</h3>
          <h2 class="section-title">{{ $t("contact.title") }}</h2>
        </v-col>
      </v-row>
      <v-row justify="center">
        <v-col cols="12" sm="10" md="8" lg="6">
          <v-form ref="contact" class="contact-form">
            <v-alert
              v-show="formResult.text"
              :type="formResult.type"
              :text="formResult.text"
              density="compact"
              class="mb-8"
            ></v-alert>
            <v-text-field
              v-model="contactForm.name"
              :rules="[rules.required, rules.length(3)]"
              :label="$t('contact.name')"
              variant="outlined"
              class="mb-4"
            ></v-text-field>
            <v-text-field
              v-model="contactForm.email"
              :rules="[rules.email]"
              :label="$t('contact.email')"
              variant="outlined"
              class="mb-4"
            ></v-text-field>
            <v-text-field
              v-model="contactForm.phone"
              :rules="[rules.phone]"
              :label="$t('contact.phone')"
              variant="outlined"
              class="mb-4"
            ></v-text-field>
            <v-textarea
              v-model="contactForm.message"
              :rules="[rules.required, rules.length(5)]"
              auto-grow
              variant="outlined"
              :label="$t('contact.message')"
              rows="3"
              class="mb-4"
            ></v-textarea>
            <VueRecaptcha
              :sitekey="siteKey"
              :load-recaptcha-script="true"
              @verify="captchaVerified = true"
              @error="captchaVerified = false"
              class="mb-6 captcha"
            ></VueRecaptcha>
            <v-btn
              type="submit"
              class="submit-btn"
              :disabled="!captchaVerified"
              block
              @click="submitContact"
              >submit</v-btn
            >
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </section>
</template>

<script>
import { VueRecaptcha } from "vue-recaptcha";
export default {
  name: "Contact-component",
  components: {
    VueRecaptcha,
  },
  data() {
    return {
      siteKey: "6LcF3uIkAAAAAJAjETCCM22xcLPbopZ67N1nDLns",
      contactForm: {
        name: null,
        email: null,
        phone: null,
        message: null,
      },
      captchaVerified: false,
      formResult: { text: null, type: "error" },
      rules: {
        email: (v) =>
          !!(v || "").match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
          ) || this.$t("contact.emailFormatErr"),
        length: (len) => (v) =>
          (v || "").length >= len ||
          this.$t("contact.lengthErr", { length: len }),
        phone: (v) =>
          !!v.match(/^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/) ||
          this.$t("contact.phoneErr"),
        required: (v) => !!v || "This field is required",
      },
    };
  },
  methods: {
    async submitContact() {
      const isValid = await this.$refs.contact.validate();
      if (isValid.valid) {
        this.sendEmail();
      }
    },
    async sendEmail() {
      const headers = new Headers();
      const result = await fetch(
        `${process.env.CURRENT_BASE_HOST}sendMail.php?name=${this.contactForm.name}&email=${this.contactForm.email}&phone=${this.contactForm.phone}&message=${this.contactForm.message}&lang=${this.$i18n.locale}`,
        {
          method: "POST",
          headers,
        }
      )
        .then(function (response) {
          return response.json();
        })
        .then(function (data) {
          return data;
        })
        .catch((err) => {
          console.log(err);
        });
      if (result) {
        this.formResult = {
          type: "success",
          text: this.$t("contact.sendMailSuccess"),
        };
      } else {
        this.formResult = {
          type: "error",
          text: this.$t("contact.sendMailErr"),
        };
      }
      setTimeout(() => {
        this.formResult.text = null;
      }, 7500);
    },
    handleSuccess(response) {
      console.log(response);
    },
  },
};
</script>
<style lang="scss">
@import "@/assets/styles/contact";
</style>
