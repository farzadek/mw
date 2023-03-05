import { createRouter, createWebHashHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import i18n from "@/plugins/i18n";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/portfolio",
    name: "portfolio",
    component: () =>
      import(
        /* webpackChunkName: "portfolio" */ "../views/portfolio/PortfolioIndex.vue"
      ),
  },
  {
    path: "/portfolio/graphic",
    name: "portfolioGraphic",
    component: () =>
      import(
        /* webpackChunkName: "portfolio-graphic" */ "../views/portfolio/PortfolioGraphic.vue"
      ),
  },
  {
    path: "/portfolio/ui",
    name: "portfolioUi",
    component: () =>
      import(
        /* webpackChunkName: "portfolio-ui" */ "../views/portfolio/PortfolioUi.vue"
      ),
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

router.beforeEach((to) => {
  let lang = to.params.lang;
  if (!lang) {
    i18n.local = "en";
  }
});

export default router;
