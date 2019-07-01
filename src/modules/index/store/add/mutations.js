import toast from '../../../../common/components/toast';

const mutations = {
  uploadImageData(state,listData){
    let {isSuccess, data ,error, type} = listData;
    if(isSuccess){
        state.img = data;
    }else{
        state.error = error;
    }
  },
  setAddAticle(state,listData) {
    let {isSuccess, data ,error, type} = listData;
    if(isSuccess){
      // toast(data,{delay:1500});
    }else{
      toast(error,{delay:1500});
    }
  }
};

export default mutations;
