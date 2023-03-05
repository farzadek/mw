import { createStore } from "vuex";
import portfolio from "./modules/portfolio";

export default createStore({
  modules: {
    portfolio,
  },
});
