import { articleList,audit,rejectTo } from '@/api/diary';

const article = {
  state: {
    list:'',
    audit:'',
    errCode:'',
    message:''
  },
  mutations: {
    SET_LIST: (state, list) => {
      state.list = list;
    },
    ERR_TIP: (state, message) => {
      state.message = message;
    },
    ERR_CODE: (state, errCode) => {
      state.errCode = errCode;
    },
    SET_AUDIT: (state, audit) => {
      state.audit = audit;
    },
    SET_REJECT: (state, data) => {
      state.reject = data;
    }
  },
  actions: {
    getList ({ commit }, params) {
      return new Promise((resolve, reject) => {
        articleList(params).then(response => {
          if(response.status){
            const data = response.result;
            commit('SET_LIST', data);
            resolve();
          }else {
            commit('ERR_TIP', response.errMessage);
            commit('ERR_CODE', response.errCode);
            resolve();
          }
        }).catch(error => {
          reject(error);
        });
      });
    },
    setAudit ({ commit }, type){
      return new Promise((resolve, reject) => {
        audit(type).then(response => {
          if(response.status){
            const data = response.result;
            commit('SET_AUDIT', data);
            resolve();
          }else {
            commit('ERR_TIP', response.errMessage);
            commit('ERR_CODE', response.errCode);
            resolve();
          }
        }).catch(error => {
          reject(error);
        });
      });
    },
    setReject ({ commit }, type){
      return new Promise((resolve, reject) => {
        rejectTo(type).then(response => {
          if(response.status){
            const data = response.result;
            commit('SET_REJECT', data);
            resolve();
          }else {
            commit('ERR_TIP', response.errMessage);
            commit('ERR_CODE', response.errCode);
            resolve();
          }
        }).catch(error => {
          reject(error);
        });
      });
    }
  }
};

export default article;
