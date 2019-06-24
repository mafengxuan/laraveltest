import Axios from 'axios';

export function storeExtInfo(data) {
  return Axios.post('/api/index/userInfo/storeExtInfo',data);
}

export function updateArticle(data) {
  return Axios.post('/api/index/article/update/'+data.id,data);
}

export function getArticle(data) {
  return Axios.get('/api/index/userInfo/show');
}
