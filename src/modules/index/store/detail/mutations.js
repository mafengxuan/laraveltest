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
  },
  setCollect(state,data) {
    if(data){
      state.info.collected = false;
    }else {
      state.info.collected = true;
    }
  }
};

export default mutations;
