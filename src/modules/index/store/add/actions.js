import api from '../../api/api';

const actions = {
  async addAticle ({ commit, state},params) {
    const s = await api.addAticle(params);
    commit('setAddAticle',s);
  },
  async uploadImage ({ commit, state},params) {
    const s = await api.uploadImage(params);
    commit('uploadImageData',s);
  }
};

export default actions;
