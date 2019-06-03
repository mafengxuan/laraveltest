import api from '../../api/api';

const actions = {
  async getList ({ commit, state},params) {
    const s = await api.getList(params);
    commit('getListData',s);
  },
  async showTags ({ commit, state},params) {
    console.log(state)
    const s = await api.showTags(params);
    // commit('showTagsData',s);
  }
};

export default actions;
