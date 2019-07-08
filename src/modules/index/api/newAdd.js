import Axios from 'axios';

export function uploadImage(params) {
  return Axios.post('/api/uploadImage',params);
}

export function detailStore(params) {
  return Axios.post('/api/index/detail/store',params);
}
