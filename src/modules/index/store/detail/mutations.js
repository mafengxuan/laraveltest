const mutations = {
  getDetailData(state,listData){
    let {isSuccess, data ,error, type} = listData;
    if(isSuccess){
        state.info = data;
    }else{
        state.error = error;
    }
  },
  clearList(state) {
    state.info = '';
  }
};

export default mutations;
