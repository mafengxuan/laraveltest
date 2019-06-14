import Axios from 'axios';

export function getMsg(data) {
  return Axios.get('/api/index/aboutMyMsg');
}
