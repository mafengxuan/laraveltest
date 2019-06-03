const mutations = {
  uploadImageData(state,listData){
    let {isSuccess, data ,error, type} = listData;
    if(isSuccess){
        state.img = data;
    }else{
        state.error = error;
    }
  }
}

export default mutations
