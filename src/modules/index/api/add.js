import Axios from 'axios';

export function storeExtInfo(data) {
  return Axios.post('/api/index/userInfo/storeExtInfo',data);
}
