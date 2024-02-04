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

                    <div class="d-flex mb-4">
                      <v-text-field
                        v-model="recaptchaValue"
                        :label="$t('contact.captcha')"
                        variant="outlined"
                        class="mb-4"
                      ></v-text-field>
                      <VueClientRecaptcha
                        :value="recaptchaValue"
                        @getCode="getCaptchaCode"
                        @isValid="checkValidCaptcha"
                      />
                    </div>

                    <v-btn
                      class="submit-btn"
                      :disabled="!recaptchaData.isValid"
                      block
                      @click="submitContactVoice"
                      >submit</v-btn
                    >
                  </v-form>
                </v-window-item>

                <v-window-item class="recording-audio" value="two">
                  <v-form ref="contactVoice" class="contact-form">
                    <v-row justify="center" class="text-center">
                      <v-col cols="12">
                        <v-alert
                          v-show="formResult.text"
                          :type="formResult.type"
                          :text="formResult.text"
                          density="compact"
                          class="mb-8"
                        ></v-alert>
                        <v-btn
                          @click="recordBtnClicked"
                          :icon="isRecording ? 'mdi-stop' : 'mdi-record'"
                          size="x-large"
                          class="record-button my-4"
                        />
                      </v-col>
                      <v-col cols="12">
                        <audio
                          v-show="savedAudio"
                          class="mb-2"
                          id="audioElement"
                          :src="savedAudio"
                          controls
                        />
                        <p>{{ audioCountDown.content }}</p>
                      </v-col>
                      <v-col cols="12">
                        <v-textarea
                          v-model="contactForm.message"
                          :rules="[rules.required, rules.length(5)]"
                          auto-grow
                          variant="outlined"
                          :label="$t('contact.message')"
                          rows="3"
                          class="mb-4"
                        ></v-textarea>
                      </v-col>
                      <v-col cols="12">
                        <v-btn
                          class="submit-btn"
                          :disabled="!savedAudio"
                          block
                          @click="uploadAudio"
                          :text="$t('contact.send')"
                        />
                      </v-col>
                    </v-row>
                  </v-form>
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
import { ref, reactive } from "vue";
import VueClientRecaptcha from "vue-client-recaptcha";
import { mapGetters } from "vuex";

export default {
  name: "Contact-component",
  components: {
    VueClientRecaptcha,
  },
  data() {
    return {
      formTab: null,
      contactForm: {
        name: null,
        email: null,
        phone: null,
        message: null,
      },
      contactVoice: {
        message: null,
      },
      recaptchaValue: ref(null),
      recaptchaData: reactive({
        captchaCode: null,
        isValid: false,
      }),
      formResult: { text: null, type: "error" },
      rules: {
        email: (v) =>
          !!(v || "").match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
          ) || this.$t("contact.emailFormatErr"),
        length: (len) => (v) =>
          (v || "").length >= len ||
          this.$t("contact.lengthErr", { length: len }),
        // phone: (v) =>
        //   !!v.match(/^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/) ||
        //   this.$t("contact.phoneErr"),
        required: (v) => !!v || "This field is required",
      },
      isRecording: false,
      audioChunks: [],
      rec: null,
      savedAudio: null,
      audioCountDown: { timer: 0, content: null },
    };
  },
  computed: {
    ...mapGetters("common", ["baseUrl"]),
  },
  methods: {
    uploadAudio() {
      console.log(this.savedAudio);
    },
    recordBtnClicked() {
      if (this.isRecording) {
        this.stopRecording();
      } else {
        this.startRecording();
      }
    },
    startRecording() {
      this.startusingBrowserMicrophone(true);
      this.setCountDown();
    },
    async getUserMedia(constraints) {
      if (window.navigator.mediaDevices) {
        return await window.navigator.mediaDevices.getUserMedia(constraints);
      }
      const legacyApi =
        navigator.getUserMedia ||
        navigator.webkitGetUserMedia ||
        navigator.mozGetUserMedia ||
        navigator.msGetUserMedia;
      if (legacyApi) {
        return new Promise(function (resolve, reject) {
          legacyApi.bind(window.navigator)(constraints, resolve, reject);
        });
      } else {
        return false;
      }
    },
    handlerFunction(stream) {
      this.rec = new MediaRecorder(stream);
      this.rec.start();
      this.isRecording = true;
      this.savedAudio = null;
      this.rec.ondataavailable = (e) => {
        this.audioChunks.push(e.data);
        if (this.rec.state == "inactive") {
          const blob = new Blob(this.audioChunks, { type: "audio/mp3" });
          this.savedAudio = URL.createObjectURL(blob);
          // console.log(`${blob.size / (1024 * 1024)} MB`);
          document.getElementById("audioElement").src = this.savedAudio;
        }
      };
    },
    setCountDown() {
      setTimeout(() => {
        clearInterval(audioInterval);
        this.stopRecording();
      }, 60000);
      this.audioCountDown.timer = 60;
      this.audioCountDown.content = `00:${this.audioCountDown.timer}`;
      const audioInterval = setInterval(() => {
        this.audioCountDown.content = `00:${--this.audioCountDown.timer}`;
      }, 1000);
    },
    startusingBrowserMicrophone(boolean) {
      this.getUserMedia({ audio: boolean })
        .then((stream) => {
          // console.log(stream);
          this.handlerFunction(stream);
        })
        .catch((err) => console.log(err));
    },
    stopRecording() {
      this.rec.stop();
      this.audioCountDown.content = null;
      this.isRecording = false;
    },
    async submitContact() {
      const isValid = await this.$refs.contact.validate();
      if (isValid.valid) {
        this.sendEmail();
      }
    },
    async submitContactVoice() {
      const isValid = await this.$refs.contact.validate();
      if (isValid.valid) {
        this.sendEmail();
      }
    },
    getCaptchaCode(value) {
      this.recaptchaData.captchaCode = value;
    },
    checkValidCaptcha(value) {
      this.recaptchaData.isValid = value;
    },
    async sendEmail() {
      const headers = new Headers();
      let result = false;
      await fetch(
        `${this.$store.getters["common/baseUrl"]}/api/sendMail.php?who='farzadek@gmail.com'&name=${this.contactForm.name}&email=${this.contactForm.email}&phone=${this.contactForm.phone}&message=${this.contactForm.message}&lang=${this.$i18n.locale}`,
        {
          method: "POST",
          headers,
        }
      )
        .then(function (response) {
          return response.json();
        })
        .then(function (data) {
          result = data.result;
          console.log(result);
          return data;
        })
        .catch((err) => {
          console.log(err);
        });
      this.$refs.contact.reset();
      if (result) {
        this.formResult = {
          type: "success",
          text: this.$t("contact.sendMailSuccess"),
        };
        await fetch(
          `${this.$store.getters["common/baseUrl"]}/api/sendMail.php?&who=${this.contactForm.email}&lang=${this.$i18n.locale}`,
          {
            method: "POST",
            headers,
          }
        )
          .then(function (response) {
            return response.json();
          })
          .catch((err) => {
            console.log(err);
          });
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
  },
};
</script>
