import Axios from 'axios';

export function getDetail() {
  return Axios.get('/api/index/article/showMyArticle');
}

export function storeExtInfo(data) {
  return Axios.post('/api/index/userInfo/storeExtInfo',data);
}

export function addAticle(params) {
  return Axios.post('/api/index/article/store',params);
}

export function uploadImage(params) {
  return Axios.post('/api/uploadImage',params);
}
