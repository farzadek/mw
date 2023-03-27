import { createStore } from "vuex";
import portfolio from "./modules/portfolio";
import common from "./modules/common";

export default createStore({
  modules: {
    common,
    portfolio,
  },
});
