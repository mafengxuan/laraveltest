import Axios from 'axios';

export function uploadImage(params) {
  return Axios.post('/api/uploadImage',params);
}

export function detailStore(params) {
  return Axios.post('/api/index/detail/store',params);
}

export function detailUpdate(params) {
  return Axios.post('/api/index/detail/update/'+params.id,params);
}

export function getDetail(params) {
  return Axios.get('/api/index/detail/'+params);
}
