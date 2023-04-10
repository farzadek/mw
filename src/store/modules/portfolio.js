import { uniqueArray } from "../../plugins/tools";

const state = () => ({
  portfolios: { ui: [], graphic: [] },
  uiSections: [],
});

// getters
const getters = {
  portfoliosPreview: (state) => (category) => {
    return state.portfolios[category].slice(0, 3);
  },
  portfoliosList: (state) => (category) => {
    return state.portfolios[category];
  },
  uiSections: (state) => {
    return state.uiSections;
  },
};

// actions
const actions = {
  async loadPortfolio({ state, commit, rootGetters }, category) {
    if (state.portfolios[category].length === 0) {
      let headers = new Headers();
      const content = await fetch(
        `${rootGetters["common/baseUrl"]}/api/filelist.php?cat=${category}`,
        {
          method: "get",
          headers: headers,
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
      commit("setPortfolios", { category, content });
      if (category === "ui") {
        commit("setUiSections", { content });
      }
    }
  },
};

// mutations
const mutations = {
  setPortfolios(state, payload) {
    state.portfolios[payload.category] = payload.content;
  },
  setUiSections(state, payload) {
    let items = payload.content.map((el) => el.url.slice(0, -6));
    var outputArray = uniqueArray(items);
    state.uiSections = outputArray;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};
