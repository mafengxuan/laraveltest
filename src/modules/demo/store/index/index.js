import actions from './actions';
import getters from './getters';
import mutations from './mutations';

const state = {
  cat: '',
  progress: true,         //进度条
  error: ''
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
