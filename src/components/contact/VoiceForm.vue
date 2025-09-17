<template>
  <v-form ref="contactVoice" class="contact-form">
    <v-overlay
      v-model="setOverlay"
      absolute
      opacity="0"
      full-height
      persistent
    ></v-overlay>
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
          :icon="isRecording ? 'mdi-stop' : 'mdi-microphone'"
          :color="isRecording ? 'red-darken-1' : ''"
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
        <input type="file" name="file" id="file" class="d-none" />
        <p v-if="isRecording">{{ audioCountDown.content }}</p>
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
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "Voice-form",
  data() {
    return {
      isRecording: false,
      audioChunks: [],
      rec: null,
      savedAudio: null,
      audioCountDown: { timer: 0, content: null },
      formResult: { text: null, type: "error" },
      setOverlay: true,
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
      this.setOverlay = true;
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
        /* auto stop after 60sec. */
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
      this.setOverlay = false;
    },
    submitContactVoice() {
      /*  needs to validate file-recorded */
      this.uploadFile();
    },
    uploadFile() {},
  },
};
</script>
