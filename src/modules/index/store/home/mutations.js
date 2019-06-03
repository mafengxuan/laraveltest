const mutations = {
  getListData(state,listData){
    let {isSuccess, data ,error, type} = listData;
    if(isSuccess){
        state.list = data;
    }else{
        state.error = error;
    }
  }
};

export default mutations;
