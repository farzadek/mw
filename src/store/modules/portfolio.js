import { getRandomNumbers } from "../../plugins/tools";

const state = () => ({
  portfolios: { ui: [], graphic: [] },
  portfoliosPreview: { ui: [], graphic: [] },
});

// getters
const getters = {
  portfoliosPreview: (state) => (category) => {
    return state.portfoliosPreview[category];
  },
};

// actions
const actions = {
  async loadPortfolio({ commit }, category) {
    let headers = new Headers();
    const content = await fetch(
      `http://localhost:8888/mw-vue/api/filelist.php?cat=${category}`,
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
  },
};

// mutations
const mutations = {
  setPortfolios(state, payload) {
    state.portfolios[payload.category] = payload.content;

    const previewItemsCount = 3;
    let theItems = [];
    const uino = getRandomNumbers(state.portfolios[payload.category].length, 3);
    for (let i = 0; i < previewItemsCount; i++) {
      let photo = state.portfolios[payload.category][uino[i]].split("/");
      theItems.push(photo[photo.length - 1]);
    }
    state.portfoliosPreview[payload.category] = theItems;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};
