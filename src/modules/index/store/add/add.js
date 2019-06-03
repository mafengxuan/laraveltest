import actions from './actions';
import getters from './getters';
import mutations from './mutations';

const state = {
  img:''
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
};
