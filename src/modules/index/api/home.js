import Axios from 'axios';

export function setPraise(data) {
  return Axios.post('/api/index/praise',data);
}
