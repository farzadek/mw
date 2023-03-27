const state = () => ({
  baseUrl: null,
});

// getters
const getters = {
  baseUrl: () =>
    process.env.NODE_ENV === "production"
      ? "https://montrealweb.ca/mw-vue"
      : "http://localhost:8888/mw-vue",
};

// actions
const actions = {};

// mutations
const mutations = {};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};
