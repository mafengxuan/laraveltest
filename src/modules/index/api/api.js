import Axios from 'axios';

const api = {
  addAticle(params) {
    return new Promise(function(resolve, reject){
      console.log(params)
      Axios.post('/api/index/article/store',params)
      .then(function(res){
        if(res.data.status){
          resolve({
            isSuccess: true,
            data: res.data.data
          })
        }else {
          resolve({
            isSuccess: false,
            error: res.message
          })
        }
      }).catch(function(res){
        resolve({
          isSuccess: false,
          error: ''
        })
      })
    });
  },
  getList(params) {
    return new Promise(function(resolve, reject){
      console.log(params)
      Axios.get('/api/index/article/showList/'+params.showList)
      .then(function(res){
        if(res.data.status){
          resolve({
            isSuccess: true,
            data: res.data.data
          })
        }else {
          resolve({
            isSuccess: false,
            error: res.message
          })
        }
      }).catch(function(res){
        resolve({
          isSuccess: false,
          error: ''
        })
      })
    });
  },
  showTags(params) {
    return new Promise(function(resolve, reject){
      Axios.post('/api/index/article/store',params)
      .then(function(res){
        if(res.data.status){
          resolve({
            isSuccess: true,
            data: res.data.data
          })
        }else {
          resolve({
            isSuccess: false,
            error: res.message
          })
        }
      }).catch(function(res){
        resolve({
          isSuccess: false,
          error: ''
        })
      })
    })
  }
};

export default api;
