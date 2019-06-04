import toast from '../../../../common/components/toast';

const mutations = {
  getuserInfo(state,listData){
    let {isSuccess, data ,error, type} = listData;
    if(isSuccess){
        state.userInfo = data;
    }else{
        state.error = error;
    }
  },
};

export default mutations;
