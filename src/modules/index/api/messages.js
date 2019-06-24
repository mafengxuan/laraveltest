import Axios from 'axios';

export function getMsg(data) {
  return Axios.get('/api/index/aboutMyMsg');
}

export function addReply(data) {
  return Axios.post('/api/index/addReply',data);
}
