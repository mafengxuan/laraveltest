const mutations = {
  getListData(state,listData){
    let {isSuccess, data ,error, type} = listData;
    if(isSuccess){
        state.list = data;
    }else{
        state.error = error;
    }
  },
  showTagsData(state,listData){
    let {isSuccess, data ,error, type} = listData;
    if(isSuccess){
        state.tags = data;
    }else{
        state.error = error;
    }
  },
  clearList(state) {
    state.list = '';
  }
};

export default mutations;
