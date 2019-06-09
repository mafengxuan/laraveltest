import { articleList } from '@/api/diary';

const article = {
  state: {
    list:'',
    errCode:'',
    message:''
  },
  mutations: {
    SET_LIST: (state, list) => {
      console.log(list);
      state.list = list;
    },
    ERR_TIP: (state, message) => {
      state.message = message;
    },
    ERR_CODE: (state, errCode) => {
      state.errCode = errCode;
    }
  },
  actions: {
    getList ({ commit }, type) {
      return new Promise((resolve, reject) => {
        articleList(type).then(response => {
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
    }
  }
};

export default article;
