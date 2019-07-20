import Axios from 'axios';

export function commentsList(data) {
  return Axios.get('/api/index/commentsList/'+data.id);
}

export function addComments(data) {
  return Axios.post('/api/index/addComments',data);
}

export function collect(data) {
  return Axios.post('/api/index/collect/'+data.id,data);
}

export function setPraise(data) {
  return Axios.post('/api/index/praise/'+data.id,data);
}
