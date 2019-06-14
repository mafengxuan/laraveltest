import Axios from 'axios';

export function commentsList(data) {
  return Axios.get('/api/index/commentsList/'+data.id);
}

export function addComments(data) {
  return Axios.post('/api/index/addComments',data);
}
