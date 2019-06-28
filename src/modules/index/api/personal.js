import Axios from 'axios';

export function updateUserInfo(data) {
  return Axios.post('/api/index/userInfo/update',data);
}

export function showTags(data) {
  return Axios.get('/api/index/userInfo/showTags');
}

export function checkStore() {
  return Axios.get('/api/index/userInfo/checkStore');
}
