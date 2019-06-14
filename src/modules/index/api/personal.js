import Axios from 'axios';

export function updateUserInfo(data) {
  return Axios.post('/api/index/userInfo/update',data);
}
