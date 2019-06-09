import Axios from 'axios';

const api = {
  //添加文章
  addAticle(params) {
    return new Promise(function(resolve, reject){
      Axios.post('/api/index/article/store',params).
      then(function(res){
        if(res.data.status){
          resolve({
            isSuccess: true,
            data: res.data.result
          });
        }else {
          resolve({
            isSuccess: false,
            error: res.data.errMessage
          });
        }
      }).catch(function(res){
        resolve({
          isSuccess: false,
          error: ''
        });
      });
    });
  },
  //首页列表
  getList(params) {
    return new Promise(function(resolve, reject){
      Axios.get('/api/index/article/showList/'+params.showList).
      then(function(res){
        if(res.data.status){
          resolve({
            isSuccess: true,
            data: res.data.result
          });
        }else {
          resolve({
            isSuccess: false,
            error: res.data.errMessage
          });
        }
      }).catch(function(res){
        resolve({
          isSuccess: false,
          error: ''
        });
      });
    });
  },
  //首页标签
  showTags(params) {
    return new Promise(function(resolve, reject){
      Axios.get('/api/index/article/showTags')
      .then(function(res){
        if(res.data.status){
          resolve({
            isSuccess: true,
            data: res.data.result
          });
        }else {
          resolve({
            isSuccess: false,
            error: res.data.errMessage
          });
        }
      }).catch(function(res){
        resolve({
          isSuccess: false,
          error: ''
        });
      });
    });
  },
  //add页面添加图片
  uploadImage(params) {
    return new Promise(function(resolve, reject){
      Axios.post('/api/uploadImage',params).
      then(function(res){
        if(res.data.status){
          resolve({
            isSuccess: true,
            data: res.data.result
          });
        }else {
          resolve({
            isSuccess: false,
            error: res.data.errMessage
          });
        }
      }).catch(function(res){
        resolve({
          isSuccess: false,
          error: ''
        });
      });
    });
  },
  //个人中心
  userInfo(params) {
    return new Promise(function(resolve, reject){
      Axios.get('/api/index/userInfo/show').
      then(function(res){
        if(res.data.status){
          resolve({
            isSuccess: true,
            data: res.data.result
          });
        }else {
          resolve({
            isSuccess: false,
            error: res.data.errMessage
          });
        }
      }).catch(function(res){
        resolve({
          isSuccess: false,
          error: ''
        });
      });
    });
  },
  //详情页
  getDetail(params) {
    return new Promise(function(resolve, reject){
      console.log(params)
      Axios.get('/api/index/article/show/'+params).
      then(function(res){
        if(res.data.status){
          resolve({
            isSuccess: true,
            data: res.data.result
          });
        }else {
          resolve({
            isSuccess: false,
            error: res.data.errMessage
          });
        }
      }).catch(function(res){
        resolve({
          isSuccess: false,
          error: ''
        });
      });
    });
  }
};

export default api;
