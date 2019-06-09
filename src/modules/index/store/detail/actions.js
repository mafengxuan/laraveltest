import api from '../../api/api';

const actions = {
  async getDetail ({ commit, state},params) {
    const s = await api.getDetail(params);
    commit('getDetailData',s);
  }
};

export default actions;
