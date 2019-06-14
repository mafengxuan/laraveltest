import Axios from 'axios';

export function getBanner(data) {
  return Axios.get('/api/index/discovery/showList?type='+data.type);
}
