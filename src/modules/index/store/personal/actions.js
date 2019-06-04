import api from '../../api/api';

const actions = {
  async userInfo ({ commit, state},params) {
    const s = await api.userInfo(params);
    commit('getuserInfo',s);
  }
};

export default actions;
