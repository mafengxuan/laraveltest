import api from '../../api/api';

const actions = {
  async addAticle ({ commit, state},params) {
    const s = await api.addAticle(params);
    commit('setAddAticle',s);
  }
};

export default actions;
