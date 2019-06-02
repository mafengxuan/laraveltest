import Vue from 'vue';
import vuex from 'vuex';
import actions from './actions';
import getters from './getters';
import mutations from './mutations';
import Add from './add/add';
import Home from './home/home';

const state = {

};

Vue.use(vuex);

export default new vuex.Store({ //store对象
  state,
  getters,
  actions,
  mutations,
  modules: {
    Add:Add,
    Home:Home
  }
});
