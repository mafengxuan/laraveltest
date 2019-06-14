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
  initTagsData(state,tagData){
    for(var i=0;i<tagData.length;i++){
      for(var j=0;j<tagData[i].data.length;j++){
        state.tags[i].data[j].status = false;
      }
    }
  },
  setTagsData(state,data) {
    const tags = state.tags;
    let {status,key ,id} = data;
    for(var i=0;i<tags.length;i++){
      if(tags[i].id == id){
        for(var j=0;j<tags[i].data.length;j++){
          if(key == tags[i].data[j].key){
            state.tags[i].data[j].status = status;
          }
        }
      }
    }
  },
  clearList(state) {
    state.list = '';
  }
};

export default mutations;
