import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import PortfolioUiView from "../views/PortfolioUi.vue";
import PortfolioGraphicView from "../views/PortfolioGraphic.vue";
import i18n from "@/plugins/i18n";
const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/graphic",
    name: "portfolioGraphic",
    component: PortfolioGraphicView,
  },
  {
    path: "/ui",
    name: "portfolioUi",
    component: PortfolioUiView,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to) => {
  let lang = to.params.lang;
  if (!lang) {
    i18n.local = "en";
  }
});

export default router;
