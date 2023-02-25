import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import i18n from "./plugins/i18n";
import vuetify from "./plugins/vuetify";
import "@mdi/font/css/materialdesignicons.css";
createApp(App).use(vuetify).use(i18n).use(store).use(router).mount("#app");
